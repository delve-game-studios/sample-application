<?php

namespace App\Factories\ErrorHandlers;

class ViewNotFoundException {
	public function __construct($viewName) {
		// excetipn for developers
		echo sprintf("<br />\n<b>Fatal Error</b>: View not found!<br />\nPlease check the <b>'app/config/factories.php'</b> file for missing key: <b>'%s'</b> under the <b>[views]</b> section", $viewName);
		echo '<br /><br /><b>app/config/factories.php</b><br /><pre>';
		print_r(include(ROOT . 'app\config\factories.php'));exit;
	}
}