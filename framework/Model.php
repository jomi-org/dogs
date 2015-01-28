<?php
/**
 * Created by PhpStorm.
 * User: macseem
 * Date: 1/23/15
 * Time: 11:08 PM
 */

namespace framework;


abstract class Model {

    protected $attributes = array();

    public function __construct()
    {
        $this->attributes = array_flip($this->getAttributeNames());
        foreach($this->attributes as &$attribute)
            $attribute = NULL;
    }

    public function __set($name, $value)
    {
        if(isset($this->{'_'.$name}))
            $this->{'_'.$name} = $value;
        else
            $this->attributes[$name] = $value;
    }

    public function __get($name){
        if(isset($this->{'_'.$name}))
            return $this->{'_'.$name};
        $callable = array($this,'get'.ucfirst($name));
        if(is_callable($callable))
            return call_user_func($callable);
        if(isset($this->attributes[$name]))
            return $this->attributes[$name];
        return NULL;
    }

    public function getAttributes() {
        return $this->attributes;
    }
    /**
     * @return array
     */
    public abstract function getAttributeNames();

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
        foreach($this->getAttributeNames() as $attribute) {
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