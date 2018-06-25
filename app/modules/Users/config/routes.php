<?php

return [
	'/login' => [
		'class' => \App\Modules\Users\Controllers\Login::class,
		'action' => 'signIn',
		'pageName' => 'Login'
	],
	'/logout' => [
		'class' => \App\Modules\Users\Controllers\Login::class,
		'action' => 'signOut',
		'pageName' => 'Logout'
	],
	'/register' => [
		'class' => \App\Modules\Users\Controllers\Login::class,
		'action' => 'signUp',
		'pageName' => 'Register'
	],
	'/users' => [
		'class' => \App\Modules\Users\Controllers\Users::class,
		'action' => 'index',
		'pageName' => 'Users'
	],
	'/users/new' => [
		'class' => \App\Modules\Users\Controllers\Users::class,
		'action' => 'create',
	],

];