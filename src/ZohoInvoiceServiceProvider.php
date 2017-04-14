<?php

namespace Webleit\ZohoBooksApi;

use Illuminate\Support\ServiceProvider;

class ZohoInvoiceServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->singleton('webleit.zohobooksapi', function($app)
        {
            $client = new \Webleit\ZohoBooksApi\ZohoBooks($app['config']->get('services.zohoinvoice.key'),
                $app['config']->get('services.zohoinvoice.organizationid'));

            return $client;
        });
        $this->app->bind('Webleit\ZohoBooksApi', 'webleit.zohobooksapi');
    }
}
