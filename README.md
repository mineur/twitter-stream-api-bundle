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

## Simple custom command usage
```php
// Controllers/DemoController.php

class DemoCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        //...
    }
    
    public function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var PublicStream $publicStream */
        $publicStream = $this
            ->getContainer()
            ->get('twitter_stream_api_consumer');
        $publicStream
            ->listenFor([
                'your', 
                'keywords', 
                'list'
            ])
            ->setLanguage('es')
            ->do(function(Tweet $tweet) {
                // you can do whatever you want with this output
                // prompt it, enqueue it, persist it into a database ...
                $output->writeln($tweet);
            });
    }
}
```
Check out the library for full customization of the public stream: 
[twitter-stream-api](https://github.com/mineur/twitter-stream-api) 

## Command line actions
Tu use the pre-configured commands:
* To prompt the stream feed on your terminal:
```php
bin/console mineur:twitter-stream:consume hello,hola,aloha
```
* To enqueue the stream output as a serialized objects in a FIFO Redis queue, 
type the following:
> This part is subject to RSQueue library and RSQueueBundle. I recommend you to 
> check the [RSQueue documentation](https://github.com/rsqueue/RSQueueBundle) 
> to consume the enqueued objects. 
```php
bin/console mineur:twitter-stream:enqueue hello,hola,aloha
```

## The Tweet output
Consuming the stream will give you an infinite loop of hydrated Tweet objects, 
similar to this one:
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
