<?php
/**
 * Created by PhpStorm.
 * User: macseem
 * Date: 1/25/15
 * Time: 12:55 PM
 */

namespace app\controllers;


use app\models\Auth;
use app\models\Profile;
use app\models\User;
use app\models\UserInterest;
use framework\Controller;
use framework\Core;
use framework\Exception;

class UserController extends Controller{

    public $layout = "main";

    public function actionSignUp()
    {
        $message = '';
        if(!empty(Core::$app->request->post)){
            $auth = new Auth();
            $profile = new Profile();
            try{
                $auth->fillFromRequest();
                $auth->cryptPassword();
                $auth->save();
                $profile->fillFromRequest();
                $profile->user_id = $auth->id;
                $profile->save();
                $userInterest = new UserInterest();
                $userInterest->user_id = $auth->id;
                $userInterest->fillFromRequest();
                $userInterest->save();
            } catch(Exception $e){
                $message = $e->getMessage();
            }
        }
        Core::$app->request->post['msg'] = $message;
        return $this->render('user/signup',Core::$app->request->post);
    }
}