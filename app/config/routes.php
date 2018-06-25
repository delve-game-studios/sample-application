<?php

return [
	'/' => [
		'class' => 'App\Controllers\App',
		'action' => 'index',
		'pageName' => 'Home',
		'nav' => 1
	],
	'/animals' => [
		'class' => 'App\Controllers\Animals',
		'action' => 'index',
		'pageName' => 'Animals',
		'nav' => 2
	]
];