<?php
/**
 * Created by PhpStorm.
 * User: macseem
 * Date: 2/18/15
 * Time: 12:16 AM
 */

namespace app\controllers;


use jf\Controller;

class BreedsController extends Controller {

    public $layout = 'main';

    public function actionCatalog()
    {
        return $this->render('breeds/catalog');
    }
}