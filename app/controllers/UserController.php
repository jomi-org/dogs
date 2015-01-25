<?php
/**
 * Created by PhpStorm.
 * User: macseem
 * Date: 1/25/15
 * Time: 12:55 PM
 */

namespace app\controllers;


use app\models\User;
use framework\Controller;
use framework\Core;

class UserController extends Controller{

    public $layout = "main";

    public function actionSignUp()
    {
        if(!empty(Core::$app->request->post)){
            $model = new User();
            $model->fillFromRequest();
            $model->save();
        }
        return $this->render('user/signup',array('login' => 'login'));
    }
}