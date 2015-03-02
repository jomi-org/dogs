<?php
/**
 * Created by PhpStorm.
 * User: macseem
 * Date: 2/18/15
 * Time: 12:16 AM
 */

namespace app\controllers;


use app\models\Breed;
use jf\controllers\ControlledController as Controller;
use jf\Core;
use jf\helpers\DbHelper;

class BreedController extends Controller {

    public $layout = 'main';

    public function actionCatalog()
    {
        return $this->render('breed/catalog');
    }

    public function actionView($id)
    {
        $breed = new Breed();
        $breed->findById($id);
        return $this->render('breed/view',['breed' => $breed]);

    }

    public function actionSearch()
    {
        return $this->render('breed/search');
    }

    public function actionCreate()
    {
        return $this->render('breed/create');
    }

    public function actionSave()
    {
        $this->laout=false;
    }
}