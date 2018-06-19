<?php

define('ROOT', __DIR__ . DIRECTORY_SEPARATOR);
 
spl_autoload_register(function($class) {
	$file_name_arr = explode(DIRECTORY_SEPARATOR, $class);

	foreach($file_name_arr as $key => $value) {
		if($key == (count($file_name_arr) - 1)) {
			continue;
		}

		$file_name_arr[$key] = lcfirst($value);
	}

	$file = ROOT . implode(DIRECTORY_SEPARATOR, $file_name_arr) . '.php';
	if(file_exists($file)) {
		require_once $file;
		// var_dump($file);
	}
});

?>