<?php

namespace PosInvoice\Providers;

use PosInvoice\Helper\PosInvoiceHelper;
use Plenty\Plugin\ServiceProvider;

class PosInvoiceServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->getApplication()->register(PosInvoiceRouteServiceProvider::class);
    }

    public function boot(PosInvoiceHelper $helper)
    {
        //Create new payment method
        $helper->createMopIfNotExist();
    }
}