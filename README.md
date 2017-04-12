# Zoho Books API v3 - PHP SDK

This Library is a SDK in PHP that simplifies the usage of the Zoho Books Api version 3 (https://www.zoho.com/books/api/v3/)
It provides both an interface to ease the interaction with the APIs without bothering with the actual REST request, while packaging the various responses using very simple Model classes that can be then uses with any other library or framework.

## Installation 

TODO

## Usage

In order to use the library, just require the composer autoload file, and then fire up the library itself.
In order for the library to work, you need to provide an auth token for the zoho book apis.

```php
require './vendor/autoload.php';
$zohoBooks = new \Webleit\ZohoBooksApi\ZohoBooks('authtoken');
```

If you have more than one organization in the account, you can specify the organization id as the second parameter:

```php
$zohoBooks = new \Webleit\ZohoBooksApi\ZohoBooks('authtoken', 'organization_id');
```

## API calls

To call any Api, just use the same name reported in the api docs.
You can get the list of supported apis using the getAvailableModules() method

```php
$zohoBooks->getAvailableModules();
```

You can, for example, get the list of invoices by using:

```php
$invoices = $zohoBooks->invoices->getList();
```

or the list of contacts

```php
$contacts = $zohoBooks->contacts->getList();
```

### List calls

To get a list of resources from a module, use the getList() method

```php
$invoices = $zohoBooks->invoices->getList();
```

It's possible to pass through some parameters to filter the result (see the zoho books api docs for some examples)

```php
$invoices = $zohoBooks->invoices->getList(['status' => 'unpaid']);
```

In order to navigate the pages, just use the "page" and "per_page" parameters in the getList call

```php
$invoices = $zohoBooks->invoices->getList(['status' => 'unpaid', 'page' => 3, 'per_page' => 200]);
```


## Return Types

Any "list" api call returns a Collection object, which is taken for Laravel Collection package.
You can therefore use the result as Collection, which allows mapping, reducing, serializing, etc

```php
$invoices = $zohoBooks->invoices->getList();

$data = $invoices->toArray();
$json = $invoices->toJson();

// After fetch filtering in php
$filtered = $invoices->where('total', '>', 200);

// Grouping
$filtered = $invoices->groupBy('customer_id');

```

Any "resource" api call returns a Model object of a class dedicated to the single resource you're fetching.
For example, calling

```php
$invoice = $zohoBooks->invoices->get('idoftheinvoice');
$id = $invoice->getId();
$data = $invoice->toArray();
$total = $invoice->total;

```

will return a \Webleit\ZohoBooksApi\Models\Invoice object, which is Arrayable and Jsonable, and that can be therefore used in many ways.

## Contributing

Finding bugs, sending pull requests or improving the docs - any contribution is welcome and highly appreciated

## Versioning

Semantic Versioning Specification (SemVer) is used.

## Copyright and License

Copyright Weble Srl under the MIT license.
