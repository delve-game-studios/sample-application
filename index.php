<?php
define('ROOT', __DIR__ . DIRECTORY_SEPARATOR);
define('APP', ROOT . 'app' . DIRECTORY_SEPARATOR);
define('MODULES', APP . 'modules' . DIRECTORY_SEPARATOR);
require __DIR__ . DIRECTORY_SEPARATOR . 'autoloader.php';
$app = App\Application::getInstance();
$app->exec();