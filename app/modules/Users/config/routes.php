<?php

return [
	'/login' => [
		'class' => \Users\Controllers\Login::class,
		'action' => 'signIn',
		'pageName' => 'Login'
	],
	'/logout' => [
		'class' => \Users\Controllers\Login::class,
		'action' => 'signOut',
		'pageName' => 'Logout'
	],
	'/register' => [
		'class' => \Users\Controllers\Login::class,
		'action' => 'signUp',
		'pageName' => 'Register'
	],
	'/users' => [
		'class' => \Users\Controllers\Users::class,
		'action' => 'index',
		'pageName' => 'Users'
	],
	'/users/new' => [
		'class' => \Users\Controllers\Users::class,
		'action' => 'create',
	],

];