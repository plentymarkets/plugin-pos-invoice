<?php

namespace PosInvoice\Providers;

use Plenty\Modules\Payment\Method\Contracts\PaymentMethodContainer;
use PosInvoice\Helper\PosInvoiceHelper;
use PosInvoice\Methods\PosInvoicePaymentMethod;
use Plenty\Plugin\ServiceProvider;

class PosInvoiceServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->getApplication()->register(PosInvoiceRouteServiceProvider::class);
    }

    public function boot(PosInvoiceHelper $helper, PaymentMethodContainer $payContainer)
    {
        //Create new payment method
        $helper->createMopIfNotExist();

        //Register the Pos Invoice Plugin
        $payContainer->register(PosInvoiceHelper::PLUGIN_KEY.'::'.PosInvoiceHelper::PAYMENT_KEY, PosInvoicePaymentMethod::class, []);
    }
}
