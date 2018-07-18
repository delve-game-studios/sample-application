<?php

namespace App\Modules;

use App\Helpers\Traits\SingletonPattern;

abstract class Module
{
    use SingletonPattern;

    protected $config;

    protected $routes;

    protected $factories;

    protected $dependencies;

    private function __construct()
    {
        $base = realpath(MODULES . dirname(get_called_class())) . DIRECTORY_SEPARATOR;
        $this->config = include($base . 'config/config.php');
        $this->routes = include($base . 'config/routes.php');
        $this->factories = include($base . 'config/factories.php');
        $this->dependencies = include($base . 'config/dependencies.php');
    }

    public function getConfig()
    {
        return $this->config;
    }

    public function getRoutes()
    {
        return $this->routes;
    }

    public function getFactories()
    {
        return $this->factories;
    }

    public function getDependencies()
    {
        return $this->dependencies;
    }
}
