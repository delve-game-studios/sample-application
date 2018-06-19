<?php

namespace App\Helpers\Traits;

trait HasParams {
	private $params;
	
	public function getAllParams() {
		return $this->params;
	}

	public function getParam($param_name, $default_value = null) {
		$param_arr = explode('::', $param_name);

		$depth = $this->params;
		foreach ($param_arr as $key => $value) {
			if(empty($depth[$value])) {
				return $default_value;
			}

			$depth = $depth[$value];
		}
		return $depth;
	}

	public function setParam($param_name, $param_value) {
		$param_arr = explode('::', $param_name);

		$depth = &$this->params;
		foreach($param_arr as $key => $value) {
			if(empty($depth[$value]) && $key < (count($param_arr) - 1)) {
				$depth[$value] = [];
			} elseif ($key == (count($param_arr) - 1)) {
				$depth[$value] = $param_value;
				return $param_value;
			}
		}

		return false;
	}
}

?>