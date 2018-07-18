<?php

namespace App\Repositories;

use App\Helpers\Traits\SingletonPattern;
use App\Helpers\Config;
use App\Models\Model;

abstract class Repository
{
    use SingletonPattern;

    private $model;

    private $modelInstance;

    private function __construct()
    {
        $config = Config::getInstance();
        $classMap = explode('\\', get_called_class());
        $this->model = $config->getParam('namespaces::models') . '\\' . end($classMap);
    }

    public function getModelInstance()
    {
        return new $this->model;
    }

    public function prepare(Array $params, Model $model = null)
    {
        if (!$model) {
            $model = $this->getModelInstance();
        }

        foreach ($params as $property => $value) {
            $model->{'set' . ucfirst($property)}($value);
        }
        $this->modelInstance = $model;
        return $this;
    }

    public function save()
    {
        if (!$this->modelInstance) {
            $this->prepare([]);
        }

        if (!$this->modelInstance->getId()) {
            // INSERT
        } else {
            // UPDATE
        }
        // use ORM to save data to DB using $this->modelInstance
        var_dump($this->modelInstance);
        exit;
    }

    public function getAll()
    {
        // use ORM to get all rows from the DB using $this->model for table name
        $testData = [];

        for ($i = 1; $i <= 100; $i++) {
            $index = $i - 1;
            $testData[$index] = $this->getModelInstance();
            $testData[$index]->setId($i);
            $testData[$index]->setName('Animal ' . $i);
            $testData[$index]->setDescription('Description for Animal ' . $i);
        }

        return $testData;
    }
}
