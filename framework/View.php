<?php
/**
 * Created by PhpStorm.
 * User: macseem
 * Date: 1/23/15
 * Time: 11:09 PM
 */

namespace framework;

/**
 * Class View
 * @package framework
 */
class View {

    /** @var  static */
    private static $_instance;
    public static $layout = false;

    public static function getInstance()
    {
        if(!empty(static::$_instance))
            return static::$_instance;
        else
            return static::$_instance = new View();
    }

    /**
     * @param       $file
     *
     * @param array $params
     *
     * @return string
     * @throws Exception
     */
    public static function render($file, array $params = array())
    {
        if(!file_exists($file))
            throw new Exception("View file $file does not exist",Core::EXCEPTION_ERROR_CODE);
        foreach($params as $paramName => $param) {
            ${$paramName} = $param;
        }
        ob_start();
        /** @noinspection PhpIncludeInspection */
        include ($file);
        $result = ob_get_contents();
        ob_end_clean();
        return $result;
    }
}