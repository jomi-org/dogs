<?php
/**
 * Created by PhpStorm.
 * User: macseem
 * Date: 1/23/15
 * Time: 8:53 PM
 */
namespace framework;

define('BASE_DIR',dirname(__DIR__));
/**
 * Class Core
 * @package framework
 */
class Core {
    const EXCEPTION_ERROR_CODE = 500;

    /** @var  Application */
    public static $app;
    /** @var  Config */
    public static $config;

    public static $baseDir = BASE_DIR;
    /**
     * @param $name
     *
     * @return bool
     */
    public static function moduleExists($name)
    {
        return self::$config->moduleConfigExists($name);
    }

    /**
     * @param string $name
     *
     * @return Module
     */
    public static function getModule($name)
    {
        return Module::getNew(static::$config->getModuleConfig($name));
    }


}