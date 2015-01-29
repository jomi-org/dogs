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
 * @property int id
 * @property mixed|null name
 */
class Interest extends ActiveRecord
{

    /**
     * @return array
     */
    public function getAttributeNames()
    {
        return array(
            'id',
            'name'
        );
    }

    /**
     * @return array
     */
    public function getRequiredFields()
    {
        return array('name');
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
        return 'interest';
    }
}