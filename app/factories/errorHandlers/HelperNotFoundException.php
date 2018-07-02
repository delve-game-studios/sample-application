<?php

namespace App\Factories\ErrorHandlers;

class HelperNotFoundException {
	public function __construct($helperName) {
		// excetipn for developers
		echo sprintf("<br />\n<b>Fatal Error</b>: Helper not found!<br />\nPlease check the <b>'app/config/factories.php'</b> file for missing key: <b>'%s'</b> under the <b>[helpers]</b> section", $helperName);
		echo '<br /><br /><b>app/config/factories.php</b><br /><pre>';
		print_r(include(VENDOR . 'composer\autoload_classmap.php'));exit;
	}
}