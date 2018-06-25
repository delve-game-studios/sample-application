<?php
define('ROOT', __DIR__ . DIRECTORY_SEPARATOR);
require __DIR__ . DIRECTORY_SEPARATOR . 'autoloader.php';
$app = App\Application::getInstance();
$app->exec();