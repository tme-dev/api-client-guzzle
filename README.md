TME-API Guzzle Client
=====================

This library provides a [Guzzle](https://github.com/guzzle/guzzle) Client which communicates with TME API.

Read more at:

* https://developers.tme.eu/en
* https://tme.eu/en/

Installation:

    composer require tme/api-client-guzzle
    
Example usage:

```php
<?php

// Register your app here https://developers.tme.eu/en/dev
const TOKEN = '';
const SECRET = '';

require 'vendor/autoload.php';

// Factory Guzzle client.
$client = \TMEApi\ClientFactory::factoryForCredentials(TOKEN, SECRET);

// Send request
$options = [
    'form_params' => [
        'SymbolList' => [
            'NE555D',
            '1N4007-DIO'
        ],
        'Country' => 'US',
        'Language' => 'EN',
    ],
];

$result = $client->request('POST', '/Products/GetProducts.json', $options);

print_r(
    json_decode($result->getBody(), true)
);
```
