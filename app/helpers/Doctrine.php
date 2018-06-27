<?php
namespace App\Helpers;
use App\Helpers\Traits\SingletonPattern;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class Doctrine {
	use SingletonPattern;

	private $_dbParams = [];
	private $_config;
	private $_em;

	private function __construct() {
		$configHelper = Config::getInstance();
		$this->_dbParams = $configHelper->getParam('DB::params', []);
		$paths = $configHelper->getParam('DB::paths');
		$isDevMode = $configHelper->getParam('DB::isDevMode');
		$this->_config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
		$this->_em = EntityManager::create($this->_dbParams, $this->_config);
	}

	public function getEntityManager() {
		return $this->_em;
	}

	public function getConfig() {
		return $this->_config;
	}

	public function getParams() {
		return $this->_dbParams;
	}
}

