mod-google-shopping
===========
Guys, we definetly need to do something with this repo. I see several ways:

[![Latest Stable Version](https://poser.pugx.org/panix/mod-google-shopping/v/stable)](https://packagist.org/packages/panix/mod-google-shopping)
[![Latest Unstable Version](https://poser.pugx.org/panix/mod-google-shopping/v/unstable)](https://packagist.org/packages/panix/mod-google-shopping)
[![Total Downloads](https://poser.pugx.org/panix/mod-google-shopping/downloads)](https://packagist.org/packages/panix/mod-google-shopping)
[![Monthly Downloads](https://poser.pugx.org/panix/mod-google-shopping/d/monthly)](https://packagist.org/packages/panix/mod-google-shopping)
[![Daily Downloads](https://poser.pugx.org/panix/mod-google-shopping/d/daily)](https://packagist.org/packages/panix/mod-google-shopping)
[![License](https://poser.pugx.org/panix/mod-google-shopping/license)](https://packagist.org/packages/panix/mod-google-shopping)

#### Either run

```
php composer require --prefer-dist panix/mod-google-shopping "*"
```

or add

```
"panix/mod-google-shopping": "*"
```

to the require section of your `composer.json` file.

#### Add to web config.
```
'modules' => [
    'shop' => ['class' => 'panix\mod\google\shopping\Module'],
],
```

#### Migrate
```
php yii migrate --migrationPath=vendor/panix/mod-google-shopping/migrations
```

1. Add the component configuration in your `main.php` config file:
```php
'components' => [
    'ga' => [
        'class' => 'panix\mod\google\shopping\components\MeasurementProtocol',
        'tracking_id' => 'UA-XXXX-Y', // Put your real tracking ID here

        // These parameters are optional:
        'use_ssl' => true, // If you’d like to use a secure connection to Google servers
        'override_ip' => false, // By default, IP is overridden by the user’s one, but you can disable this
        'anonymize_ip' => true, // If you want to anonymize the sender’s IP address
        'async_mode' => true, // Enables the asynchronous mode (see below)
        'autoset_client_id' => true, // Try to set ClientId automatically from the “_ga” cookie (disabled by default)
    ],
],
```

Thats all!


