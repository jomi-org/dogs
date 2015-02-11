<?php
/**
 * Created by PhpStorm.
 * User: macseem
 * Date: 1/25/15
 * Time: 11:20 PM
 */
global $argv;
define('APPLICATION_DIR',__DIR__);
$documentRoot = dirname(__DIR__);
require_once $documentRoot.'/vendor/autoload.php';
use jf\Config;
use jf\ConsoleApplication;
use jf\Core;

$_config = array_merge(
    require $documentRoot . '/config/cli.php',
    array('modules' => array( 'request' => array(
        'class' => \jf\modules\ConsoleRequest::class,
        'argv' => $argv))
));
$config = new Config($_config);
$app = new ConsoleApplication($config);
$app->run();