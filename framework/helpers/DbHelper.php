<?php
/**
 * Created by PhpStorm.
 * User: macseem
 * Date: 1/29/15
 * Time: 1:16 AM
 */

namespace framework\helpers;


use framework\Core;
use framework\Exception;

abstract class DbHelper {

    /**
     * @param array $values
     *
     * @return string
     */
    public static function getSets(array $values)
    {
        $sets = array();
        foreach($values as $key => $value){
            $sets[] = Core::$app->db->pdo->quote($key).'='.Core::$app->db->pdo->quote($value);
        }
        return join(', ',$sets);
    }

    /**
     * @param $conditions
     *
     * @return mixed
     * @throws Exception
     */
    public static function getConditions($conditions)
    {
        if(is_string($conditions))
            return ' WHERE '. $conditions;
        throw new Exception("Other functionality is not developed yet", 500);
    }
}