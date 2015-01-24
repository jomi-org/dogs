<?php
/**
 * Created by PhpStorm.
 * User: macseem
 * Date: 1/23/15
 * Time: 8:56 PM
 */

namespace framework;

/**
 * Class Application
 * @package framework
 * @property array $params
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
        throw new Exception("Can't get method", 500);
    }

    private function init(Config $config)
    {
        Core::$config = $config;
        $this->params = $config->params;
        $this->config = $config;
    }

    public function run()
    {
        try{
            $this->handleRequest($this->getRequest());
        } catch(Exception $e) {

        }
    }

    public function getRequest()
    {
        return new Request();
    }
    public function handleRequest(Request $request)
    {

    }


}