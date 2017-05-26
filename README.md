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

## Command line actions
For a simple usage, just type the next command on your terminal, followed by the comma-separated keywords you want to track:
```php
bin/console mineur:twitter-stream:consume hello,hola,aloha
```
And you will get an infinite loop of hydrated Tweet objects, similar to this one:
```php
Mineur\TwitterStreamApi\Tweet {#424
  -text: "Hello twitter!"
  -lang: "en"
  -createdAt: "Thu May 25 18:48:05 +0000 2017"
  -timestampMs: "1495738085984"
  -geo: array:12 [
    // ...
  ]
  -coordinates: array:14 [
    // ...
  ]
  -places: null
  -retweetCount: 236
  -favoriteCount: 52
  -user: array:38 [
    "id" => 2605080321
    // ...
  ]
}
```
