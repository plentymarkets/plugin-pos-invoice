<?php

namespace PosInvoice\Methods;

use PosInvoice\Helper\PosInvoiceHelper;
use Plenty\Modules\Payment\Method\Contracts\PaymentMethodService;
use Plenty\Plugin\ConfigRepository;

class PosInvoicePaymentMethod extends PaymentMethodService
{
    private $configRepository;

    public function __construct(ConfigRepository $configRepository)
    {
        $this->configRepository = $configRepository;
    }

    public function isActive(): bool
    {
        return false;
    }

    public function getName(): string
    {
        return PosInvoiceHelper::PLUGIN_NAME;
    }
}