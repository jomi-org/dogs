<?php
/**
 * Created by PhpStorm.
 * User: macseem
 * Date: 2/18/15
 * Time: 12:16 AM
 */

namespace app\controllers;


use jf\controllers\ControlledController as Controller;

class BreedsController extends Controller {

    public $layout = 'main';

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