<?php

use App\Core\Application;

define('ROOT', realpath(__DIR__));

require_once ROOT .  '/vendor/autoload.php';

$application = new Application();

$application->init();
$application->run();