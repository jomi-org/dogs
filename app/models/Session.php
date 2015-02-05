<?php
/**
 * Created by PhpStorm.
 * User: macseem
 * Date: 2/5/15
 * Time: 12:41 AM
 */

namespace app\models;
use framework\Core;
use framework\Exception;
use framework\traits\GetterAndSetterTrait;

/**
 * Class Session
 * @property int $user_id
 * @property string $login
 * @package app\models
 */
class Session
{
    use GetterAndSetterTrait{
        __get as getter;
        __set as setter;
    }

    public static function destroy()
    {
        session_unset();
        session_destroy();
    }

    /**
     * @param $name
     *
     * @return mixed
     * @throws Exception
     */
    public function __get($name)
    {
        if(isset($_SESSION[$name]))
            return $_SESSION[$name];
        try {
            return $this->getter($name);
        } catch(Exception $e) {}
        throw new Exception("No $name parameter in session", Core::EXCEPTION_ERROR_CODE);
    }

    public function __set($name,$value)
    {
        try {
            return $this->setter($name,$value);
        } catch(Exception $e) {
            if (!$e->getCode() == Core::EXCEPTION_SETTER_FAIL)
                throw $e;
        }
        return $_SESSION[$name] = $value;
    }
}