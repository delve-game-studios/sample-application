<?php

namespace App\Migrations;
use App\Helpers\Traits\SingletonPattern;
use App\Helpers\Capsule;

abstract class Migration {
	use SingletonPattern;

	private $_capsuleHelper;

	private function __construct() {
		$this->_capsuleHelper = Capsule::getInstance();

		$this->_schema = $this->_capsuleHelper->getSchema();	
	}

	protected function getSchema() {
		return $this->_schema;
	}
	
}