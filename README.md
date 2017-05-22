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