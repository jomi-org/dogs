<?php
/**
 * Created by PhpStorm.
 * User: macseem
 * Date: 1/26/15
 * Time: 11:00 PM
 */

namespace app\models;


use framework\ActiveRecord;

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
    public function getPrimary()
    {
        // TODO: Implement getPrimary() method.
    }

    /**
     * @return string
     */
    public function getTable()
    {
        // TODO: Implement getTable() method.
    }
}