<?php
/**
 * Created by PhpStorm.
 * User: macseem
 * Date: 1/23/15
 * Time: 11:08 PM
 */

namespace framework;


class Controller {

    protected $_view;
    public $layout;
    public function runAction($action)
    {
        $this->setLayout($this->layout);
        $methodName = 'action'.ucfirst($action);
        if(!is_callable(array($this,$methodName)))
            throw new Exception("Action could not be found", Core::EXCEPTION_ERROR_CODE);
        $action = new \ReflectionMethod($this,$methodName);
        $args = Core::$app->request->getActionParams($action->getParameters());
        $result = $action->invokeArgs($this,$args);
        return $result;
    }

    /**
     * @param       $viewFileName
     * @param array $params
     *
     * @return mixed
     * @throws Exception
     */
    public function render($viewFileName, array $params) {
        $view = $this->getView();
        $file = Core::$baseDir.'/app/views/'.trim($viewFileName,"\\/") . '.php';
        return $view->render($file,$params);
    }

    /**
     * @param $layout
     */
    protected function setLayout($layout)
    {
        $this->getView()->layout = $layout;
    }

    /**
     * @return View
     */
    protected function getView()
    {
        return View::getInstance();
    }
}