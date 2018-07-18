<?php

return [
    '/' => [
        'class' => 'App\Controllers\App',
        'action' => 'index',
        'pageName' => 'Home',
        'nav' => 1
    ],
    '/404' => [
        'class' => 'App\Controllers\App',
        'action' => 'notFound'
    ],
    '/animals' => [
        'class' => 'App\Controllers\Animals',
        'action' => 'index',
        'pageName' => 'Animals',
        'nav' => 2
    ],
    '/animals/:animal_id/read' => [
        'class' => 'App\Controllers\Animals',
        'action' => 'read',
        'constraints' => [
            ':animal_id' => '[0-9]+'
        ]
    ],
    '/animals/:animal_id/edit' => [
        'constraints' => [
            ':animal_id' => '[0-9]+'
        ]
    ]
];
