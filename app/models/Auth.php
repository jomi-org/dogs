<?php
/**
 * Created by PhpStorm.
 * User: macseem
 * Date: 1/26/15
 * Time: 11:00 PM
 */

namespace app\models;


use framework\ActiveRecord;

/**
 * Class Auth
 * @property int $id
 * @property string $login
 * @property string $password
 * @property string $salt
 * @package app\models
 */
class Auth extends ActiveRecord{

    protected $table = 'auth';

    /**
     * @return array
     */
    public function getAttributeNames()
    {
        return array(
            'id',
            'login',
            'pass',
            'salt'
        );
    }

    /**
     * @return array
     */
    public function getRequiredFields()
    {
        return array(
            'login',
            'pass',
            'salt'
        );
    }

    /**
     * @return array ( $keyName )
     */
    public function getPrimary()
    {
        return array('id');
    }

    /**
     * @return string
     */
    public function getTable()
    {
        return $this->table;
    }

    public function cryptPassword()
    {
        $this->password = md5(md5($this->password).$this->salt);
    }

    /**
     * @param mixed $value
     *
     * @return mixed
     */
    protected function setPrimary($value)
    {
        $this->id = $value;
    }
}