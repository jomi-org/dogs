<?php
/**
 * Created by PhpStorm.
 * User: macseem
 * Date: 1/25/15
 * Time: 4:45 PM
 */

namespace app\models;


use framework\Model;

class User extends Model{

    /**
     * @return array
     */
    public function getAttributes()
    {
        return array(
            'login',
            'password',
            'email',
            'name',
            'city',
            'about'
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
            'email'
        );
    }


    /**
     * @throws \Exception
     * @return bool
     */
    public function save()
    {
        return true;
    }
}