<?php

namespace App\Helpers;
use App\Application;
use App\Helpers\Traits\HasApp;

abstract class Module {
	use HasApp;

	private $modules;

	public function __construct(Application $app) {
		$this->setApp($app);
		$this->modules = include('/app/config/modules.php');
		$this->modifyRoutes();
		$this->modifyNamespacesConfig();
	}

	public function getModules() {
		return $this->modules;
	}
}

?>