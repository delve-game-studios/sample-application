<?php

return [
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
	]
];

?>