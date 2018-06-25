<?php

return [
	'helpers' => [
		'Config' => \App\Helpers\Config::class,
		'Router' => \App\Helpers\Router::class,
		'Storage' => \App\Helpers\Storage::class,
		'Request' => \App\Helpers\Request::class,
		'Session' => \App\Helpers\Session::class,
		'Controller' => \App\Helpers\Controller::class,
		'Template' => \App\Helpers\Template::class,
		'Module' => \App\Helpers\Module::class,
	],
	'controllers' => [
		'Controller' => \App\Controllers\Controller::class,
		'App' => \App\Controllers\App::class,
		'Animals' => \App\Controllers\Animals::class,
		'Login' => \App\Modules\Users\Controllers\Login::class,
		'Users' => \App\Modules\Users\Controllers\Users::class,
	],
	'views' => [
		'View' => \App\Views\View::class,
		'App' => \App\Views\App::class,
		'Animals' => \App\Views\Animals::class,
		'Login' => \App\Modules\Users\Views\Login::class,
		'Users' => \App\Modules\Users\Views\Users::class,
	],
	'repositories' => [
		'Repository' => \App\Repositories\Repository::class,
		'Animal' => \App\Repositories\Animal::class,
	],
	'modules' => [
		'Module' => \App\Modules\Module::class,
		'Users' => \App\Modules\Users\Module::class,
	]
];