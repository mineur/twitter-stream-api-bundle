<?php

/*
 * Mineur/twitter-stream-api-bundle package
 *
 * Feel free to contribute!
 *
 * @license MIT
 * @author alexhoma <alexcm.14@gmail.com>
 */

namespace Mineur\TwitterStreamApiBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

use Mineur\TwitterStreamApiBundle\DependencyInjection\TwitterStreamApiClientExtension;

class TwitterStreamApiBundle extends Bundle
{
    public function getContainerExtension()
    {
        return new TwitterStreamApiClientExtension();
    }
}