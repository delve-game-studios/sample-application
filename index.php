<?php
define('ROOT', __DIR__ . DIRECTORY_SEPARATOR);
define('APP', ROOT . 'app' . DIRECTORY_SEPARATOR);
define('MODULES', APP . 'modules' . DIRECTORY_SEPARATOR);
define('VENDOR', ROOT  . 'vendor' . DIRECTORY_SEPARATOR);

require_once VENDOR . 'autoload.php';

$app = App\Application::getInstance();
$app->exec();