<?php
/**
 * Created by PhpStorm.
 * User: macseem
 * Date: 2/17/15
 * Time: 11:38 PM
 */

namespace app\controllers;


use jf\Controller;

class SiteController extends Controller {

    public $layout = 'main';

    public function actionHome()
    {
        return $this->render('site/home');
    }

    public function actionAbout()
    {
        return $this->render('site/about');
    }

    public function actionContact()
    {
        return $this->render('site/contact');
    }
}