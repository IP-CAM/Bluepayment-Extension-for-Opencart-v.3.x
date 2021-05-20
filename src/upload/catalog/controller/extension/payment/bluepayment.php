<?php

require_once DIR_SYSTEM . '/library/bluemedia-sdk-php/index.php';

use BlueMedia\OnlinePayments\Action\ITN\Transformer;
use Psr\Log\LogLevel;
use BlueMedia\OnlinePayments\Gateway;

class ControllerExtensionPaymentBluepayment extends Controller
{
    private $view_data = [];

    public function __construct($registry)
    {
        parent::__construct($registry);

        $this->load->library('bluepayment/Dictionary/BluepaymentDictionary');
        $this->load->library('bluepayment/Helper/Logger');
        $this->load->library('bluepayment/Provider/ServiceCredentialsProvider');
        $this->load->library('bluepayment/Helper/ParamSuffixer');
        $this->load->language($this->BluepaymentDictionary->getExtensionPath());
        $this->load->model('checkout/order');
    }

    public function index(): string
    {
        $this->addLangContents();
        $this->view_data['start_transaction_uri'] = $this->BluepaymentDictionary->getStartTransactionUri();

        return $this->load->view($this->BluepaymentDictionary->getExtensionPath(), $this->view_data);
    }

    public function processCheckout(): void
    {
        if (!isset($this->session->data['order_id']) || !$this->ServiceCredentialsProvider->currencyServiceExists()) {
            $this->response->redirect($this->url->link('account/login', '', true));
        }

        $this->load->model('checkout/order');
        $this->load->library('bluepayment/Builder/TransactionBuilder');

        $order_info = $this->model_checkout_order->getOrder($this->session->data['order_id']);

        try {
            if ($order_info === false) {
                throw new Exception(sprintf('Order not found %s', $this->session->data['order_id']));
            }

            $service_credentials = $this->ServiceCredentialsProvider->getCurrencyServiceCredentials();

            $gateway = new Gateway(
                $service_credentials->getServiceId(),
                $service_credentials->getSharedKey(),
                $this->getGatewayMode()
            );

            $transaction_data = $this->TransactionBuilder->build($order_info, $service_credentials->getServiceId());

            $this->model_checkout_order->addOrderHistory(
                $this->session->data['order_id'],
                $this->config->get('payment_bluepayment_status_pending'),
                $this->language->get('text_history_payment_pending')
            );

            $this->response->setOutput($gateway->doTransactionStandard($transaction_data));
        } catch (Throwable $e) {
            $this->Logger->log(
                LogLevel::WARNING,
                'Exception in ' . __METHOD__,
                [
                    'Order ID' => $this->session->data['order_id'],
                    'data' => $e
                ]
            );

            $this->response->redirect($this->url->link('checkout/failure', '', true));
        }
    }

    public function paymentReturn(): void
    {
        $this->response->redirect($this->url->link('checkout/success', '', true));
    }

    private function addLangContents(): void
    {
        $this->view_data['text_button_checkout'] = $this->language->get('text_button_checkout');
        $this->view_data['text_information_redirect'] = $this->language->get('text_information_redirect');
        $this->view_data['text_information_payment_regulations'] = $this->language->get('text_information_payment_regulations');
    }

    private function getGatewayMode(): string
    {
        return (int) $this->config->get('payment_bluepayment_test_mode') === 1
            ? Gateway::MODE_SANDBOX
            : Gateway::MODE_LIVE;
    }

    public function processItn()
    {
        $this->load->library('bluepayment/Builder/ItnDataBuilder');
        $this->load->library('bluepayment/Service/Itn/Result/Result');
        $this->load->library('bluepayment/Service/Itn/Itn');

        try {
            $transactionConfirmed = true;

            $transaction = Gateway::doItnIn();
            $service_credentials = $this->ServiceCredentialsProvider->getCurrencyServiceCredentials($transaction->getCurrency());

            $gateway = new Gateway(
                $service_credentials->getServiceId(),
                $service_credentials->getSharedKey(),
                $this->getGatewayMode()
            );

            $orderId = $this->ParamSuffixer->removeSuffix($transaction->getOrderId());
            $order = $this->model_checkout_order->getOrder($orderId);

            $generatedOrderHash = Gateway::generateHash($this->ItnDataBuilder->build($service_credentials, $transaction));

            if ($generatedOrderHash !== $transaction->getHash()) {
                $transactionConfirmed = false;
            }

            if ($transactionConfirmed) {
                $this->load->library('bluepayment/Service/Itn/Result/Success');
                $this->load->library('bluepayment/Service/Itn/Result/Failure');
                $this->load->library('bluepayment/Service/Itn/Result/Pending');

                $this->Itn->addResult($this->Failure);
                $this->Itn->addResult($this->Success);
                $this->Itn->addResult($this->Pending);
                $this->Itn->handle($transaction->getPaymentStatus(), (int) $orderId, (int) $order['order_status_id']);
            }

            $response = $gateway->doItnInResponse($transaction, $transactionConfirmed);

            $this->Logger->log(
                LogLevel::INFO,
                'ITN response in ' . __METHOD__,
                [
                    'Order ID' => $orderId,
                    'ITN Data' => json_encode(Transformer::modelToArray($transaction)),
                    'Response' => json_encode($response)
                ]
            );

            $this->response->setOutput($response);
        } catch (Throwable $e) {
            $this->Logger->log(
                LogLevel::WARNING,
                'Exception in ' . __METHOD__,
                [
                    'Order ID' => $orderId,
                    'data' => $e
                ]
            );
            exit;
        }
    }
}
