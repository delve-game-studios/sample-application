<?php

return [
	'/page404' => [
		'class' => \App\Controllers\App::class,
		'action' => 'show404'
	],
	'/app/test-view' => [
		'class' => \App\Controllers\App::class,
		'action' => 'testViewAction'
	],
	'/app/test-model' => [
		'class' => \App\Controllers\App::class,
		'action' => 'testModelAction'
	],
	'/app/test-repository' => [
		'class' => \App\Controllers\App::class,
		'action' => 'testRepositoryAction'
	],
	'/app/test-storage' => [
		'class' => \App\Controllers\App::class,
		'action' => 'testStorageAction'
	],
	'/app/test-request' => [
		'class' => \App\Controllers\App::class,
		'action' => 'testRequestAction'
	],
	'/app/test-modules' => [
		'class' => \App\Controllers\App::class,
		'action' => 'testModulesAction'
	]
];

?>