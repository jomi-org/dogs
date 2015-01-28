<?php
/**
 * Created by PhpStorm.
 * User: macseem
 * Date: 1/26/15
 * Time: 11:07 PM
 */

namespace framework\modules;


use framework\Core;
use framework\Exception;
use framework\Module;

class Db extends Module{

    /** @var  \PDO */
    public $pdo;
    /** @var  string */
    public $connectionString;

    /**
     * @return static
     * @throws Exception
     */
    public function init()
    {
        if(empty($this->_config['dsn'])
            || empty($this->_config['username'])
            || empty($this->_config['password'])
        )
            throw new Exception("Invalid DB config", Core::EXCEPTION_ERROR_CODE);
        $this->connectionString = $this->_config['dsn'];
        $this->pdo = new \PDO($this->connectionString,$this->_config['username'],$this->_config['password']);
    }
}