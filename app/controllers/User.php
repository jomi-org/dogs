<?php
/**
 * Created by PhpStorm.
 * User: macseem
 * Date: 1/25/15
 * Time: 12:55 PM
 */

namespace app\controllers;


use framework\Controller;

class User extends Controller{

    public function actionSignUp()
    {
        return $this->render('user/signup',array('login' => 'login'));
    }
}