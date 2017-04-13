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

            return new ZohoBooks($app['config']->get('services.zohoinvoice.organizationid'),$app['config']->get('services.zohoinvoice.key'));
        });
        $this->app->bind('Webleit\ZohoBooksApi', 'webleit.zohobooksapi');
    }
}
