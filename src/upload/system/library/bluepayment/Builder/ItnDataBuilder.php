<?php

namespace bluepayment\Builder;

use bluepayment\ValueObject\ServiceCredentials;
use BlueMedia\OnlinePayments\Model\ItnIn;

final class ItnDataBuilder
{
    public function build(ServiceCredentials $service_credentials, ItnIn $transaction): array
    {
        return [
            'serviceID' => (int) $service_credentials->getServiceId(),
            'orderID' => $transaction->getOrderId(),
            'remoteID' => $transaction->getRemoteId(),
            'amount' => $transaction->getAmount(),
            'currency' => $transaction->getCurrency(),
            'gatewayID' => $transaction->getGatewayId(),
            'paymentDate' => $transaction->getPaymentDate()->format('YmdHis'),
            'paymentStatus' => $transaction->getPaymentStatus(),
            'paymentStatusDetails' => $transaction->getPaymentStatusDetails(),
        ];
    }
}
