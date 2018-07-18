<?php

namespace App\Models;

abstract class Model
{
    public $id;

    public function __call($name, $arguments)
    {
        $property = strtolower(substr($name, 3));
        $handler = substr($name, 0, 3);
        if (property_exists($this, $property)) {
            if ($handler == 'set') {
                $this->$property = $arguments[0];
            }
            if ($handler == 'get') {
                return $this->$property;
            }
        } else {
            throw new \Exception('Property not found');
        }
    }
}
