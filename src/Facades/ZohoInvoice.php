<?php
namespace Webleit\ZohoBooksApi\Facades;

use Illuminate\Support\Facades\Facade;
class ZohoInvoice extends Facade {
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'webleit.zohobooksapi'; }
}