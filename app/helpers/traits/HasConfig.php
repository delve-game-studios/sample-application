<?php

namespace App\Helpers\Traits;

use App\Factories\HelpersFactory;

trait HasConfig
{
    /**
    * @property App\Helpers\Config $config
    **/
    private $config;

    /**
    * @return App\Helpers\Config $config
    **/
    private function getConfig()
    {
        if (empty($this->config)) {
            $helpersFactory = HelpersFactory::getInstance();
            $this->config = $helpersFactory->get('Config');
        }
        return $this->config;
    }
}
