<?php

namespace PosInvoice\Helper;

use Plenty\Modules\Account\Contact\Models\Contact;
use Plenty\Modules\Account\Contact\Models\ContactAllowedMethodOfPayment;
use Plenty\Modules\Account\Models\Account;
use Plenty\Modules\Payment\Method\Contracts\PaymentMethodRepositoryContract;
use Plenty\Plugin\ConfigRepository;
use PosInvoice\Services\ContactService;
use Plenty\Plugin\Log\Loggable;

/**
 * Class PosInvoiceHelper
 * @package PosInvoice\Helper
 */
class PosInvoiceHelper
{
    use Loggable;

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
    public function __construct(
        PaymentMethodRepositoryContract $paymentMethodRepositoryContract,
        ConfigRepository $configRepository,
        ContactService $contactService
    ) {
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
        if ($this->paymentMethodId > 0) {
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

        $removeFooter = $this->configRepository->get(self::PLUGIN_NAME . '.pos.invoice.removeFooter');
        $removeFooter === 'true' ? $config['removeFooter'] = true : $config['removeFooter'] = false;

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
        /** @var Contact $contact */
        $contact = $this->contactService->getContact($contactId);

        $this->getLogger(__CLASS__ . '::' . __FUNCTION__)->error('loadedContact', $contact);

        /** @var ContactAllowedMethodOfPayment $allowedMethodOfPayment */
        foreach ($contact->allowedMethodsOfPayment as $allowedMethodOfPayment) {
            
            $this->getLogger(__CLASS__ . '::' . __FUNCTION__)->error('contact::allowedMethodsOfPayment', $allowedMethodOfPayment);

            /* check if invoice allowed for contact */
            if ($allowedMethodOfPayment->methodOfPaymentId == 2 && $allowedMethodOfPayment->allowed == 0) {
                return false;
            }
        }

        $contactClassConfig = $this->contactService->getContactInvoiceClassData($contactId);
        $this->getLogger(__CLASS__ . '::' . __FUNCTION__)->error('looking at customer class', $contactClassConfig);

        if (!empty($contactClassConfig['allowedMethodOfPaymentIdsList']) && is_array($contactClassConfig['allowedMethodOfPaymentIdsList'])) {
            /* check if invoice allowed for contact class */
            if (!in_array($this->getPaymentMethodId(), $contactClassConfig['allowedMethodOfPaymentIdsList'])) {
                return false;
            }
        }

        return true;
    }

    /**
     * @param $contactId
     * @param string $companyName
     * @return int
     */
    public function getContactPaymentTarget($contactId, $companyName = '')
    {
        /** @var Contact $contact */
        $contact = $this->contactService->getContact($contactId);

        if(strlen($companyName) && !$contact->accounts->isEmpty())
        {
            /** @var Account $account */
            foreach ($contact->accounts as $account)
            {
                if($account->companyName == $companyName && $account->timeForPaymentAllowedDays > 0)
                {
                    return (int)$account->timeForPaymentAllowedDays;
                }
            }
        }

        $contactClassConfig = $this->contactService->getContactInvoiceClassData($contactId);

        if(!empty($contactClassConfig['payableDueWithin']) && $contactClassConfig['payableDueWithin'] > 0)
        {
            return (int)$contactClassConfig['payableDueWithin'];
        }

        return (int)$this->configRepository->get(self::PLUGIN_NAME . '.pos.invoice.paymentTarget');
    }
}