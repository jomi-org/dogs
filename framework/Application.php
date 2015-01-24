<?php
/**
 * Created by PhpStorm.
 * User: macseem
 * Date: 1/23/15
 * Time: 8:56 PM
 */

namespace framework;
use framework\modules\Response;
use framework\modules\Router;

/**
 * Class Application
 * @package framework
 * @property array $params
 * @property Router $router
 * @property Response response
 */
class Application {

    /** @var  array */
    public $params;
    /** @var  Config */
    protected $config;

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
        throw new Exception("Can't get method", Core::EXCEPTION_ERROR_CODE);
    }

    private function init(Config $config)
    {
        Core::$config = $config;
        $this->params = $config->getParams();
        $this->config = $config;
    }

    public function run()
    {
        try{
            $result = $this->handleRequest($this->getRequest());
            $this->response->perform($result);
        } catch(Exception $e) {

        }
    }

    public function getRequest()
    {
        return new Request();
    }

    public function handleRequest()
    {
        $controller = $this->getController($this->router->controller);
        return $controller->runAction($this->router->action);
    }

    /**
     * @param $controller
     *
     * @return Controller
     */
    private function getController($controller)
    {
        return new Controller();
    }


}