<?php
/**
 * Created by PhpStorm.
 * User: macseem
 * Date: 1/26/15
 * Time: 11:00 PM
 */

namespace app\models;


use framework\Core;
use framework\Model;

class Auth extends Model{

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
     * @throws \Exception
     * @return bool
     */
    public function save()
    {
        Core::$app->db->insert($this->table,$this->attributes);
    }
}