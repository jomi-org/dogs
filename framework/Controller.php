<?php
/**
 * Created by PhpStorm.
 * User: macseem
 * Date: 1/23/15
 * Time: 11:08 PM
 */

namespace framework;


class Controller {

    public function runAction($action)
    {
        $methodName = 'action'.ucfirst($action);
        if(!is_callable(array($this,$methodName)))
            throw new Exception("Action could not be found", Core::EXCEPTION_ERROR_CODE);
        $action = new \ReflectionMethod($this,$methodName);
        $args = Core::$app->request->getActionParams($action->getParameters());
        $result = $action->invokeArgs($this,$args);
        return $result;
    }
}