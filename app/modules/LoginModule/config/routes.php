<?php

return [
	'/login' => [
		'class' => App\Modules\LoginModule\Controllers\LoginController::class,
		'action' => 'loginAction'
	],
	'/logout' => [
		'class' => App\Modules\LoginModule\Controllers\LoginController::class,
		'action' => 'logoutAction'
	],
	'/sign-up' => [
		'class' => App\Modules\LoginModule\Controllers\RegisterController::class,
		'action' => 'registerAction'
	]
];

?>