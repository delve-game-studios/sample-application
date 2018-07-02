<?php
// phpinfo();exit;
define('ROOT', __DIR__ . DIRECTORY_SEPARATOR);
define('APP', ROOT . 'app' . DIRECTORY_SEPARATOR);
define('MODULES', APP . 'modules' . DIRECTORY_SEPARATOR);
define('VENDOR', ROOT  . 'vendor' . DIRECTORY_SEPARATOR);

require_once VENDOR . 'autoload.php';

$key = !empty($argv[1]) ? $argv[1] : '';

$obj = \App\Helpers\Console::getInstance();

if(method_exists($obj, $key)) {
	$result = call_user_func([$obj, $key]);
	var_dump($result); // using var_dump for better print
} else {
	echo 'Wrong call';
}