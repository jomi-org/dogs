<?php
/**
 * Created by PhpStorm.
 * User: macseem
 * Date: 1/24/15
 * Time: 12:47 AM
 */

namespace framework\modules;


use framework\Core;
use framework\Exception;
use framework\Module;

class ConsoleRequest extends Request{

    /** @var   */
    public $uri;
    public $args = array();
    /**
     * @return static
     */
    public function init()
    {
        if(isset($argv))
            $this->args = $this->_config['argv'];
        $this->uri = $this->getUri();

    }

    /**
     * @return string
     */
    public function getUri()
    {
        var_dump($this->args);exit;
        if(isset($this->args[1]))
            return $this->args[1];
    }

    /**
     * @param $actionArgs
     *
     * @return array
     * @throws Exception
     */
    public function getActionParams($actionArgs)
    {
        $expectedCount = count($this->args)-3;
        $actualCount = count($actionArgs);
        if($expectedCount != $actualCount )
            throw new Exception("Expected $expectedCount arguments, $actualCount passed", Core::EXCEPTION_ERROR_CODE);
        return array_slice($this->args,2);
    }
}