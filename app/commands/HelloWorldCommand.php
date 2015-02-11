<?php
/**
 * Created by PhpStorm.
 * User: macseem
 * Date: 1/29/15
 * Time: 7:59 PM
 */

namespace app\commands;


use jf\Controller;

class HelloWorldCommand extends Controller{

    public function actionIndex()
    {
        return 'Hello World';
    }

    public function actionWithParam($param)
    {
        return 'The '.$param.' was passed';
    }
}