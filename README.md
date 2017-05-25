# Twitter Stream API Symfony Bundle
[![License](https://img.shields.io/badge/license-MIT-brightgreen.svg)]()
[![Latest Unstable Version](https://poser.pugx.org/mineur/twitter-stream-api-bundle/v/unstable)](https://packagist.org/packages/mineur/twitter-stream-api-bundle)
[![Total Downloads](https://poser.pugx.org/mineur/twitter-stream-api-bundle/downloads)](https://packagist.org/packages/mineur/twitter-stream-api-bundle)

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
            new Mineur\TwitterStreamApiBundle\TwitterStreamApiBundle(),
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

## Simple usage
```php
// Controllers/DemoController.php

class DemoController extends Controller
{
    public function consumeStreamAction()
    {
        // ...
        $this
            ->get('twitter_stream_api_consumer')
            ->listenFor(['some', 'keywords'])
            ->consume()
        ;
    }
}
```

## Demonstration
![](http://jmp.sh/T8uLZUt)