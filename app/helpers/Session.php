<?php

namespace App\Helpers;
use App\Helpers\Traits\SingletonPattern;
use App\Helpers\Traits\HasParams;
use App\Helpers\Interfaces\Helper;

class Session implements Helper {
	use SingletonPattern;
	use HasParams;

	private function __construct() {
		session_start();
		$this->refresh();
	}

	/**
	* Refreshes the Session parameters
	**/
	public function refresh() {
		$this->params = $_SESSION;
	}

	/**
	* Basic setter
	* @param String $name
	* @param Mixed $value
	**/
	public function setParam($name, $value) {
		$_SESSION[$name] = $value;
		$this->refresh();
	}

	/**
	* Destroys the session.
	**/
	public function destroy() {
		session_destroy();
		$this->refresh();
	}
}