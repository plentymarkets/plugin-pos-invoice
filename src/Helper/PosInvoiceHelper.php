<?php

namespace PosInvoice\Helper;

use Plenty\Modules\Payment\Method\Contracts\PaymentMethodRepositoryContract;

class PosInvoiceHelper
{
    const PLUGIN_NAME = 'PosInvoice';
    const PLUGIN_KEY = "plenty_pos_invoice";
    const NO_PAYMENTMETHOD_FOUND = 'no_paymentmethod_found';

    private static $paymentKey = 'POS-INVOICE';
    private static $paymentName = 'POS Invoice';

    /** @var PaymentMethodRepositoryContract $paymentMethodRepository */
    private $paymentMethodRepository;

    /**
     * PosInvoiceHelper constructor.
     * @param PaymentMethodRepositoryContract $paymentMethodRepositoryContract
     */
    public function __construct(PaymentMethodRepositoryContract $paymentMethodRepositoryContract)
    {
        $this->paymentMethodRepository = $paymentMethodRepositoryContract;
    }

    public function createMopIfNotExist()
    {
        if ($this->getPaymentMethodId() == self::NO_PAYMENTMETHOD_FOUND) {
            $paymentMethodData = array(
                'pluginKey' => self::PLUGIN_KEY,
                'paymentKey' => self::$paymentKey,
                'name' => self::$paymentName
            );

            $this->paymentMethodRepository->createPaymentMethod($paymentMethodData);
        }
    }

    /**
     * @return int|string
     */
    public function getPaymentMethodId()
    {
        $paymentMethods = $this->paymentMethodRepository->allForPlugin(self::PLUGIN_KEY);

        if (!is_null($paymentMethods)) {
            foreach ($paymentMethods as $paymentMethod) {
                if ($paymentMethod->paymentKey == self::$paymentKey) {
                    return $paymentMethod->id;
                }
            }
        }

        return self::NO_PAYMENTMETHOD_FOUND;
    }

    /**
     * @param $lang
     * @return string
     */
    public function getPaymentDisplayName($lang)
    {
        switch ($lang) {
            case 'de':
                return 'POS Kauf auf Rechnung';
            case 'en':
            default:
                return 'POS Invoice';
        }
    }
}