# Twitter Stream API Symfony Bundle
[![License](https://img.shields.io/badge/license-MIT-brightgreen.svg)]()

A Symfony integration of Mineur Twitter Stream Library.

## Installation
```php
composer require mineur/twitter-stream-api-bundle:dev-master
```

## Basic initialization
Register this bundle into your application kernel.

```php
// app/AppKernel.php
class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = [
            // ...
            new Mineur\TwitterStreamApiBundle(),
        ];
    }
}
```

Then add your authentication keys on your config file:
```yaml
# app/config/config.yml
twitter_stream_api:
    twitter:
        consumer_key: '%your_consumer_key%'
        consumer_secret: '%your_consumer_secret%'
        access_token: '%your_access_token%'
        access_token_secret: '%your_access_token_secret%'
```