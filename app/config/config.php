<?php

return [
	'domain' => 'local.samples',
	'namespaces' => [
		'repositories' => 'App\Repositories',
		'models' => 'App\Models',
		'controllers' => 'App\Controllers',
		'views' => 'App\Views',
		'helpers' => 'App\Helpers'
	],
	'templates' => [
		'path' => 'App\Templates',
		'extension' => 'template.html'
	],
	'views' => [
		'sufix' => 'View'
	],
	'storage' => [
		'type' => 'local',
		'local' => [
			'path' => 'storage/',
			'css' => [
				'path' => 'css/',
				'extension' => 'css'
			],
			'js' => [
				'path' => 'js/',
				'extension' => 'js'
			],
			'media' => [
				'path' => 'media/',
				'extensions' => ['png','jpg','jpeg','gif','mp4','mp3']
			]
		]
	]
];

?>