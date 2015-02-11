<?php
/**
 * Created by PhpStorm.
 * User: macseem
 * Date: 1/26/15
 * Time: 11:00 PM
 */

namespace app\models;


use jf\ActiveRecord;
use jf\interfaces\IUserEntity;

/**
 * Class Auth
 * @property int $id
 * @property string $login
 * @property string $password
 * @property string $salt
 * @package app\models
 */
class Auth extends ActiveRecord implements IUserEntity{

    protected $table = 'auth';

    /**
     * @return array
     */
    public function getAttributeNames()
    {
        return array(
            'id',
            'login',
            'password',
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
            'password',
        );
    }

    /**
     * @return array ( $keyName )
     */
    public function getPrimaryKeys()
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
        $this->salt = substr(md5(time()),5,4);
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

    public function checkPassword($password)
    {
        $cryptedPassword = md5(md5($password).$this->salt);
        return $this->password === $cryptedPassword;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getLogin()
    {
        return $this->login;
    }
}