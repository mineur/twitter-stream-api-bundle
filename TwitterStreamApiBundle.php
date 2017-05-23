<?php

namespace Mineur\TwitterStreamApiBundle;

use Mineur\TwitterStreamApiBundle\DependencyInjection\TwitterStreamApiExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;


class TwitterStreamApiBundle extends Bundle
{
    public function getContainerExtension()
    {
        return new TwitterStreamApiExtension()  ;
    }
}