<?php
/**
 * Created by PhpStorm.
 * User: macseem
 * Date: 2/21/15
 * Time: 12:32 PM
 */

namespace app\models;


use jf\ActiveRecord;

/**
 * Class Breed
 * @property int id
 * @package app\models
 */
class Breed extends ActiveRecord{

    /**
     * @return string
     */
    public function getTable()
    {
        return 'breed';
    }

    /**
     * @return array
     */
    public function getAttributeNames()
    {
        return [];
    }

    /**
     * @return array
     */
    public function getRequiredFields()
    {
        return [];
    }

    /**
     * @return array ( $keyName )
     */
    public function getPrimaryKeys()
    {
        return ['id'];
    }

    public function findById($id)
    {
        return $this->findOneBy('id',$id);
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