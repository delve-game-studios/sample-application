<?php
namespace App\Helpers;

use App\Helpers\Traits\SingletonPattern;
use Illuminate\Database\Capsule\Manager as CapsuleManager;

/**
*
* Illuminate/Database/Capsule/Manager Adapter
*
*/
class Capsule
{
    use SingletonPattern;

    private $_capsule;

    private $_dbParams = [];

    private $_capsuleInstances = [];

    private function __construct()
    {
        $this->getCapsuleManager();

        $this->_dbParams = Config::getInstance()->getParam('DB::illuminate');

        $this->_capsule->addConnection($this->_dbParams);

        $this->_capsule->setAsGlobal();

        $this->_capsule->bootEloquent();
    }

    public function getCapsuleManager()
    {
        if (in_array('CapsuleManager', $this->_capsuleInstances)) {
            $this->_capsule = $this->_capsuleInstances['CapsuleManager'];
            return $this->_capsule;
        }

        $this->_capsule = new CapsuleManager();

        $this->_capsuleInstances['CapsuleManager'] = $this->_capsule;

        return $this->_capsule;
    }

    public function getSchema()
    {
        return call_user_func([$this->_capsule, 'schema']);
    }

    // public function getTable() {
    //  return call_user_func([$this->_capsule, 'table']);
    // }


    public function __call($method, $params = null)
    {
        return call_user_func_array([$this->_capsule, $method], $params);
    }
}
