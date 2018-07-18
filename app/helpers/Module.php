<?php

namespace App\Helpers;

use App\Helpers\Traits\SingletonPattern;
use App\Helpers\Interfaces\Helper;
use App\Factories\ModulesFactory;

class Module implements Helper
{
    use SingletonPattern;

    private $modules;

    private $_moduleInstances;

    private function __construct()
    {
        $this->modules = include(ROOT . 'app/config/modules.php');
        $this->_moduleInstances = [];
        $this->loadModules();
    }

    public function loadModules()
    {
        $moduleFactory = ModulesFactory::getInstance();
        foreach ($this->modules as $module) {
            $this->_moduleInstances[$module] = $moduleFactory->get($module);
        }
    }

    public function getModulesRoutes()
    {
        $routes = [];

        foreach ($this->_moduleInstances as $module) {
            $routes = array_merge($routes, $module->getRoutes());
        }

        return $routes;
    }
}
