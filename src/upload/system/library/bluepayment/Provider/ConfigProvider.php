<?php
namespace bluepayment\Provider;

final class ConfigProvider
{
    private $registry;

    public function __construct($registry)
    {
        $this->registry = $registry;
    }

    public function getStatusPending(): int
    {
        return (int) $this->registry->get('config')->get('payment_bluepayment_status_pending');
    }

    public function getStatusFailure(): int
    {
        return (int) $this->registry->get('config')->get('payment_bluepayment_status_failed');
    }

    public function getStatusSuccess(): int
    {
        return (int) $this->registry->get('config')->get('payment_bluepayment_status_success');
    }
}
