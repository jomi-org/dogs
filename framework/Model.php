<?php
/**
 * Created by PhpStorm.
 * User: macseem
 * Date: 1/23/15
 * Time: 11:08 PM
 */

namespace framework;


use SebastianBergmann\Comparator\ExceptionComparatorTest;

abstract class Model {

    /**
     * @return array
     */
    public abstract function getAttributes();

    /**
     * @return array
     */
    public abstract function getRequiredFields();

    /**
     * @throws \Exception
     * @return bool
     */
    public abstract function save();

    public function fillFromRequest()
    {
        foreach($this->getAttributes() as $attribute) {
            try{
                $this->$attribute = $this->tryGetValueFromRequest($attribute);
            } catch(Exception $e) {
                if($e->getCode() == Core::EXCEPTION_NOT_ERROR_CODE){
                    if($this->isRequired($attribute))
                        throw new Exception("Attribute $attribute is required",Core::EXCEPTION_ERROR_CODE,$e);
                    continue;
                }
            }
        }
    }

    protected function tryGetValueFromRequest($attribute)
    {
        $request = Core::$app->request;
        if(!empty($request->get[$attribute])) {
            return $request->get[$attribute];
        }
        if(!empty($request->post[$attribute])) {
            return $request->post[$attribute];
        }
        throw new Exception("Can't find $attribute", Core::EXCEPTION_NOT_ERROR_CODE);
    }

    /**
     * @param string $attribute
     *
     * @return bool
     */
    protected function isRequired($attribute)
    {
        return in_array($attribute,$this->getRequiredFields());
    }
}