<?php
/**
 * Created by PhpStorm.
 * User: macseem
 * Date: 2/18/15
 * Time: 12:16 AM
 */

namespace app\modules\api\v1\controllers;


use jf\Controller as Controller;

class BreedsController extends Controller {

    public $layout = 'main';

    public function actionIndex()
    {
        echo 123;exit;
    }
    public function actionCatalog()
    {
        return $this->render('breeds/catalog');
    }

    public function actionView($id)
    {

    }

    public function actionSearch()
    {

    }

    public function actionCreate()
    {

    }

    public function actionSave()
    {
        $this->laout=false;
    }
}