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
        $response = [];
        $response['paymentMethodId'] = $this->posInvoiceHelper->getPaymentMethodId();
        $response['paymentMethodName'] = $this->posInvoiceHelper->getPaymentDisplayName($request->get('lang'));

        return $response;
    }
}