<?php

namespace App\Helpers;
use App\Helpers\Traits\HasParams;

class Session {
	use HasParams;

	public function __construct() {
		@session_start();
		$this->refresh();
	}

	public function refresh() {
		$this->params = $_SESSION;
	}

	public function set($name, $value) {
		$_SESSION[$name] = $value;
		$this->refresh();
	}

	public function destroy() {
		@session_destroy();
		$this->refresh();
	}
}

?>