<?php

namespace App\Modules\LoginModule;
use App\Application;
use App\Helpers\Interfaces\Module as ModuleInterface;
use App\Helpers\Traits\Module as ModuleTrait;
use App\Modules\LoginModule\Controllers\LoginController;

class Module extends Application implements ModuleInterface {
	use ModuleTrait;

	public function __construct() {
		$this->controller = new LoginController($this)
	}
}

?>