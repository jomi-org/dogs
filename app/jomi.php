<?php
/**
 * Created by PhpStorm.
 * User: macseem
 * Date: 1/25/15
 * Time: 11:20 PM
 */
global $argv;
require_once '../vendor/autoload.php';
use framework\Config;
use framework\ConsoleApplication;

$documentRoot = dirname(__DIR__);
$config = new Config(array_merge(
    require $documentRoot . '/config/cli.php',
    array('modules'=>array('request'=>array('argv'=>$argv)))
));
$app = new ConsoleApplication($config);
$app->run();