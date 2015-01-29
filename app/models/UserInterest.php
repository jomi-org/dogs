<?php
/**
 * Created by PhpStorm.
 * User: macseem
 * Date: 1/26/15
 * Time: 11:01 PM
 */

namespace app\models;


use framework\ActiveRecord;

/**
 * @property mixed|null user_id
 * @property mixed|null interest_id
 */
class UserInterest extends ActiveRecord{

    /**
     * @return array
     */
    public function getAttributeNames()
    {
        return array(
            'user_id',
            'interest_id'
        );
    }

    /**
     * @return array
     */
    public function getRequiredFields()
    {
        return $this->getAttributeNames();
    }

    /**
     * @return string
     */
    public function getTable()
    {
        return 'user_interest';
    }

    /**
     * @return array ( $keyName )
     */
    public function getPrimary()
    {
        return $this->getRequiredFields();
    }

    /**
     * @return ActiveRecord
     */
    public function getName()
    {
        $model = new Interest();
        return $model->findOneBy('id',$this->interest_id)->name;
    }
}