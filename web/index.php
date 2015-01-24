<?php

require_once '../vendor/autoload.php';

use framework\Application;
use framework\Config;
$documentRoot = dirname(__DIR__);
$config = new Config(require $documentRoot . '/config/web.php');

$app = new Application($config);
$app->run();
