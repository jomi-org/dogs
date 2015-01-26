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
use framework\Exception;

class UserController extends Controller{

    public $layout = "main";

    public function actionSignUp()
    {
        $message = '';
        if(!empty(Core::$app->request->post)){
            $model = new User();
            try{
                $model->fillFromRequest();
            } catch(Exception $e){
                $message = $e->getMessage();
            }
            $model->save();
        }
        Core::$app->request->post['msg'] = $message;
        return $this->render('user/signup',Core::$app->request->post);
    }
}