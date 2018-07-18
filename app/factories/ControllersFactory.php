<?php

namespace App\Factories;

use App\Factories\ErrorHandlers\ControllerNotFoundException;

class ControllersFactory extends Factory
{

    /**
    * @property Factory::factories['controllers'] $controllers
    */
    private $controllers;

    /**
    * Initialize the ControllersFactory
    **/
    public function init()
    {
        $this->controllers = $this->getAllParams();
    }


    /**
    * Which helper do you need ?
    * @param String $name
    * @return App\Controllers\Controller
    **/
    public function get($class, $arguments = null)
    {
        $classMap = explode('\\', $class);
        if (count($classMap) === 1) {
            $class = "App\\Controllers\\{$class}";
        }

        if (isset($this->controllers[$class])) {
            if ($arguments) {
                $controller = $class::getInstance($arguments);
            } else {
                $controller = $class::getInstance();
            }

            return $controller;
        }

        //put more apropriate error message here
        throw new ControllerNotFoundException($class);
    }
}
