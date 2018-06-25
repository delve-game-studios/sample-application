<?php

namespace App\Factories\ErrorHandlers;

class ModuleNotFoundException {
	public function __construct($moduleName) {
		// excetipn for developers
		echo sprintf("<br />\n<b>Fatal Error</b>: Module not found!<br />\nPlease check the <b>'app/config/factories.php'</b> file for missing key: <b>'%s'</b> under the <b>[modules]</b> section", $moduleName);
		echo '<br /><br /><b>app/config/factories.php</b><br /><pre>';
		print_r(include(ROOT . 'app\config\factories.php'));exit;
	}
}