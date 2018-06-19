<?php

return [
	'/app/test-view' => [
		'class' => \App\Controllers\App::class,
		'action' => 'testViewAction'
	],
	'/app/test-model' => [
		'class' => \App\Controllers\App::class,
		'action' => 'testModelAction'
	]
];

?>