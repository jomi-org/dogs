<?php
/**
 * Created by PhpStorm.
 * User: macseem
 * Date: 1/26/15
 * Time: 11:00 PM
 */

namespace app\models;


use jf\ActiveRecord;

/**
 * Class Profile
 *
 * @property int $user_id
 * @property $email
 * @property $name
 * @property $city
 * @property $about
 *
 * @package app\models
 */
class Profile extends ActiveRecord {

    /**
     * @return array
     */
    public function getAttributeNames()
    {
        return array(
            'user_id',
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
        return array();
    }

    /**
     * @return array ( $keyName )
     */
    public function getPrimaryKeys()
    {
        return array('user_id');
        // TODO: Implement getPrimaryKeys() method.
    }

    /**
     * @return string
     */
    public function getTable()
    {
        return 'profile';
    }

    /**
     * @param mixed $value
     *
     * @return mixed
     */
    protected function setPrimary($value)
    {
        return true;
    }
}