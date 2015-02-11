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

$_config = array_merge_recursive(
    require $documentRoot. '/app/config/cli.php',
    array('modules' => array( 'request' => array( 'argv' => $argv)))
) ;
$config = new Config($_config);
$app = new ConsoleApplication($config);
$app->run();