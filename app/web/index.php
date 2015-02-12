<?php

require_once '../../vendor/autoload.php';
define('APPLICATION_DIR',dirname(__DIR__));
use jf\Application;
use jf\Config;
$documentRoot = dirname(__DIR__);
$config = new Config(require $documentRoot . '/config/web.php');

$app = new Application($config);
$app->run();
