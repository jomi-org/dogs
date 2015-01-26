<?php
/**
 * Created by PhpStorm.
 * User: macseem
 * Date: 1/25/15
 * Time: 11:23 PM
 */

namespace framework;


class ConsoleApplication extends Application{

    protected function init(Config $config)
    {
        parent::init($config);
        $this->type = 'console';
    }

    protected function getControllerNamespace()
    {
        return '\\app\\commands\\';
    }
}