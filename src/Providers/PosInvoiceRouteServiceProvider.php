<?php

namespace PosInvoice\Providers;

use Plenty\Plugin\Routing\ApiRouter;
use Plenty\Plugin\RouteServiceProvider;

class PosInvoiceRouteServiceProvider extends RouteServiceProvider
{
    /**
     * @param ApiRouter $router
     */
    public function map(ApiRouter $router)
    {
        $router->version(['v1'], ['namespace' => 'PosInvoice\Controllers', 'middleware' => 'oauth'],
            function ($router) {
                $router->get('pos/invoice/settings', 'SettingsController@loadSettings');
            });
    }
}