<?php

namespace App\Helpers\Traits;

trait HasParams {

	/**
	* @property Array $params
	**/
	private $params;
	
	/**
	* Returns all the parameters
	* @return Array
	**/
	public function getAllParams() {
		return $this->params;
	}

	/**
	* Returns a parameter value by key or default value
	* @param String $paramName 
	* @param Mixed $defaultValue
	**/
	public function getParam($paramName, $defaultValue = null) {
		$param_arr = explode('::', $paramName);

		$depth = $this->params;
		foreach ($param_arr as $key => $value) {
			if(!isset($depth[$value])) {
				return $defaultValue;
			}

			$depth = $depth[$value];
		}
		return $depth;
	}

	/**
	* Basic setter by paramName and paramValue
	* @param String $paramName
	* @param Mixed $paramValue
	* @return Mixed $paramValue or False if error
	**/
	public function setParam($paramName, $paramValue) {
		$param_arr = explode('::', $paramName);

		$depth = &$this->params;
		foreach($param_arr as $key => $value) {
			if(!isset($depth[$value]) && $key < (count($param_arr) - 1)) {
				$depth[$value] = [];
			} elseif ($key == (count($param_arr) - 1)) {
				$depth[$value] = $paramValue;
				return $paramValue;
			}
		}

		return false;
	}
}