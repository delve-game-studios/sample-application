<?php

return [
	'domain' => 'local.samples',
	'title' => 'Sample Application',
	'titleFormat' => '%page - %app',
	'namespaces' => [
		'repositories' => 'App\Repositories',
		'models' => 'App\Models',
		'controllers' => 'App\Controllers',
		'views' => 'App\Views',
		'helpers' => 'App\Helpers',
		'modules' => 'App\Modules'
	],
	'templates' => [
		'path' => 'App\Templates',
		'extension' => 'template.html',
		'brackets' => ['{{', '}}'],
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
	],
	'DB' => [
		'params' => [
			'driver' => 'pdo_mysql',
			'user' => 'root',
			'password' => '61p1yw4azD16',
			'dbname' => 'sampledb'
		],
		'paths' => [dirname(APP . 'models')],
		'isDevMode' => false
	]
];