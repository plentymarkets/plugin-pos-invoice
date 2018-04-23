<?php

namespace PosInvoice\Helper;

use Plenty\Modules\Payment\Method\Contracts\PaymentMethodRepositoryContract;
use Plenty\Plugin\ConfigRepository;
use PosInvoice\Services\ContactService;

/**
 * Class PosInvoiceHelper
 * @package PosInvoice\Helper
 */
class PosInvoiceHelper
{
    const PLUGIN_NAME = 'PosInvoice';
    const PLUGIN_KEY = "plenty_pos_invoice";
    const NO_PAYMENTMETHOD_FOUND = 'no_paymentmethod_found';
    const PAYMENT_KEY = 'POS-INVOICE';
    const PAYMENT_NAME = 'POS Invoice';

    /** @var PaymentMethodRepositoryContract $paymentMethodRepository */
    private $paymentMethodRepository;

    /** @var ConfigRepository $configRepository */
    private $configRepository;

    /** @var ContactService $contactService */
    private $contactService;

    /** @var int $paymentMethodId the POS Invoice Payment Method Id */
    private $paymentMethodId = 0;

    /**
     * PosInvoiceHelper constructor.
     * @param PaymentMethodRepositoryContract $paymentMethodRepositoryContract
     * @param ConfigRepository $configRepository
     * @param ContactService $contactService
     */
    public function __construct(PaymentMethodRepositoryContract $paymentMethodRepositoryContract,
                                ConfigRepository $configRepository,
                                ContactService $contactService)
    {
        $this->paymentMethodRepository = $paymentMethodRepositoryContract;
        $this->configRepository = $configRepository;
        $this->contactService = $contactService;
    }

    public function createMopIfNotExist()
    {
        if ($this->getPaymentMethodId() == self::NO_PAYMENTMETHOD_FOUND) {
            $paymentMethodData = array(
                'pluginKey' => self::PLUGIN_KEY,
                'paymentKey' => self::PAYMENT_KEY,
                'name' => self::PAYMENT_NAME
            );

            $this->paymentMethodRepository->createPaymentMethod($paymentMethodData);
        }
    }

    /**
     * @return int|string
     */
    public function getPaymentMethodId()
    {
        if($this->paymentMethodId > 0)
        {
            return $this->paymentMethodId;
        }

        $paymentMethods = $this->paymentMethodRepository->allForPlugin(self::PLUGIN_KEY);

        if (!is_null($paymentMethods)) {
            foreach ($paymentMethods as $paymentMethod) {
                if ($paymentMethod->paymentKey == self::PAYMENT_KEY) {
                    $this->paymentMethodId = $paymentMethod->id;
                    return $paymentMethod->id;
                }
            }
        }

        return self::NO_PAYMENTMETHOD_FOUND;
    }

    /**
     * @return array
     */
    public function getConfig()
    {
        $config = [];
        $config['paymentTarget'] = (int)$this->configRepository->get(self::PLUGIN_NAME.'.pos.invoice.paymentTarget');

        return $config;
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
                return 'POS Invoice';
            default:
                return self::PAYMENT_NAME;
        }
    }

    /**
     * @param $contactId
     * @return bool
     */
    public function isAllowedForContact($contactId)
    {
        $allowed = false;

        $contactConfig = $this->contactService->getContactInvoiceConfig($contactId);

        if(!empty($contactConfig['allowedMethodOfPaymentIdsList']) && is_array($contactConfig['allowedMethodOfPaymentIdsList']))
        {
            foreach ($contactConfig['allowedMethodOfPaymentIdsList'] as $mopId)
            {
                if($mopId == $this->getPaymentMethodId())
                {
                    $allowed = true;
                    break;
                }
            }
        }
        else
        {
            // is allowed if no config found
            $allowed = true;
        }

        return $allowed;
    }
}