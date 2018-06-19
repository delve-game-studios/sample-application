<?php

return [
	'/app/test-action' => [
		'class' => \App\Controllers\App::class,
		'action' => 'testAction'
	],
	'/app/tests-action' => [
		'class' => \App\Controllers\App::class,
		'action' => 'testsAction'
	]
];

?>