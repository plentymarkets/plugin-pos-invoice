<?php

namespace PosInvoice\Controllers;

use Plenty\Plugin\Http\Request;
use PosInvoice\Helper\PosInvoiceHelper;
use Plenty\Plugin\Controller;

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
        $paymentMethod['pluginKey'] = "PLUGINKEY";
        $paymentMethod['paymentKey'] = "PAYMENTKEY";
        $paymentMethod['name'] = $this->posInvoiceHelper->getPaymentDisplayName($request->get('lang'));

        $response = [];
        $response['mop'] = $paymentMethod;

        $contactId = $request->get('contactId');

        $response['allowedForContact'] = true;
        $response['paymentTarget'] = 30;

        return $response;
    }
}