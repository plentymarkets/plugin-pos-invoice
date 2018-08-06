<?php

namespace PosInvoice\Controllers;

use Plenty\Plugin\Http\Request;
use PosInvoice\Helper\PosInvoiceHelper;
use Plenty\Plugin\Controller;

/**
 * Class SettingsController
 * @package PosInvoice\Controllers
 */
class SettingsController extends Controller
{
    /** @var PosInvoiceHelper $posInvoiceHelper */
    private $posInvoiceHelper;

    /**
     * SettingsController constructor.
     * @param PosInvoiceHelper $posInvoiceHelper
     */
    public function __construct(PosInvoiceHelper $posInvoiceHelper)
    {
        $this->posInvoiceHelper = $posInvoiceHelper;
    }

    /**
     * @param Request $request
     * @return array
     */
    public function loadSettings(Request $request)
    {
        $paymentMethod = [];
        $paymentMethod['id'] = $this->posInvoiceHelper->getPaymentMethodId();
        $paymentMethod['pluginKey'] = $this->posInvoiceHelper::PLUGIN_KEY;
        $paymentMethod['paymentKey'] = $this->posInvoiceHelper::PAYMENT_KEY;
        $paymentMethod['name'] = $this->posInvoiceHelper->getPaymentDisplayName($request->get('lang'));

        $response = $this->posInvoiceHelper->getConfig();
        $response['mop'] = $paymentMethod;

        if (!is_null($request->get('contactId'))) {
            $response['allowedForContact'] = $this->posInvoiceHelper->isAllowedForContact($request->get('contactId'));
            $response['paymentTarget'] = $this->posInvoiceHelper->getContactPaymentTarget($request->get('contactId'), $request->get('companyName'));
        }

        return $response;
    }
}