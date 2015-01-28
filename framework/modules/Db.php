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

    /**
     * @param string $table
     * @param array  $values
     *
     * @return string
     */
    public function insert($table, array $values)
    {
        $sql = 'INSERT INTO '
            .$this->pdo->quote($table) . ' '
            .$this->getSets($values);
        $this->pdo->exec($sql);
        return $this->pdo->lastInsertId();
    }

    /**
     * @param       $table
     * @param array $values
     * @param       $conditions
     *
     * @return int
     * @throws Exception
     */
    public function update($table, array $values, $conditions)
    {
        $sql = 'UPDATE ' . $this->pdo->quote($table) . ' '
            .$this->getSets($values) . ' '
            .$this->getConditions($conditions);
        return $this->exec($sql);
    }

    /**
     * @param $table
     * @param $conditions
     *
     * @return int
     * @throws Exception
     */
    public function delete($table, $conditions)
    {
        $sql = 'DELETE FROM '.$this->pdo->quote($table).' '
            .$this->getConditions($conditions);
        return $this->exec($sql);
    }

    public function query($sql)
    {
        return $this->pdo->query($sql);
    }

    public function exec($sql)
    {
        return $this->pdo->exec($sql);
    }

    /**
     * @return bool
     */
    public function beginTransaction()
    {
        return $this->pdo->beginTransaction();
    }

    /**
     * @return bool
     */
    public function commit()
    {
        return $this->pdo->commit();
    }

    private function getSets(array $values)
    {
        $sets = array();
        foreach($values as $key => $value){
            $sets[] = $this->pdo->quote($key).'='.$this->pdo->quote($value);
        }
        return join(', ',$sets);
    }

    /**
     * @param $conditions
     *
     * @return mixed
     * @throws Exception
     */
    private function getConditions($conditions)
    {
        if(is_string($conditions))
            return $conditions;
        throw new Exception("Other functionality is not developed yet", 500);
    }
}