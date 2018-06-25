<?php

namespace App\Factories\ErrorHandlers;

class ControllerNotFoundException {
	public function __construct($controllerName) {
		// excetipn for developers
		echo sprintf("<br />\n<b>Fatal Error</b>: Controller not found!<br />\nPlease check the <b>'app/config/factories.php'</b> file for missing key: <b>'%s'</b> under the <b>[controllers]</b> section", $controllerName);
		echo '<br /><br /><b>app/config/factories.php</b><br /><pre>';
		print_r(include(ROOT . 'app\config\factories.php'));exit;
	}
}