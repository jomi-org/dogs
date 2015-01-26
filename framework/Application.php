<?php
/**
 * Created by PhpStorm.
 * User: macseem
 * Date: 1/23/15
 * Time: 8:56 PM
 */

namespace framework;
use framework\controllers\ErrorController;
use framework\modules\Request;
use framework\modules\Response;
use framework\modules\Router;

/**
 * Class Application
 * @package framework
 * @property array $params
 * @property Router $router
 * @property Response $response
 * @property Request $request
 */
class Application {

    /** @var  array */
    public $params;
    /** @var  Config */
    protected $config;

    public $type = 'web';

    public function __construct(Config $config)
    {
        Core::$app = $this;
        $this->init($config);
    }

    public function __get($name)
    {
        if(!empty($this->{'_'.$name}))
            return $this->{'_'.$name};
        if(method_exists($this,'get'.ucfirst($name)))
            return $this->{'_'.$name} = $this->{'get'.ucfirst($name)};
        if(Core::moduleExists($name))
            return $this->{'_'.$name} = Core::getModule($name);
        throw new Exception("Can't get method:".$name, Core::EXCEPTION_ERROR_CODE);
    }

    protected function init(Config $config)
    {
        Core::$config = $config;
        $this->params = $config->getParams();
        $this->config = $config;
    }

    public function run()
    {
        try{
            $result = $this->handleRequest();
            $this->response->perform($result);
        } catch(Exception $e) {
            $controller = new ErrorController();
            $this->response->perform($controller->actionException($e));
        }
    }

    public function handleRequest()
    {
        $controller = $this->getController($this->router->controller);
        return $controller->runAction($this->router->action);
    }

    protected function getControllerNamespace()
    {
        return '\\app\\controllers\\';
    }

    /**
     * @param $controller
     *
     * @return Controller
     * @throws Exception
     */
    protected function getController($controller)
    {
        $classname = $this->getControllerNamespace().ucfirst($controller);
        if(!class_exists($classname))
            $classname = $classname.'Controller';
        if(!class_exists($classname))
            throw new Exception("Controller $classname could not be found", Core::EXCEPTION_ERROR_CODE);
        return new $classname();
    }


}