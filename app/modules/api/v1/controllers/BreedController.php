<?php
/**
 * Created by PhpStorm.
 * User: macseem
 * Date: 2/18/15
 * Time: 12:16 AM
 */

namespace app\modules\api\v1\controllers;


use jf\Controller as Controller;

class BreedController extends Controller {

    public $layout=false;

    public function actionIndex()
    {
        echo 123;exit;
    }
    public function actionCatalog()
    {
        return $this->render('breed/catalog');
    }

    public function actionView($id)
    {

    }

    public function actionSearch()
    {
        $model = new Breed();
        $filters = array_filter(Core::$app->request->get + Core::$app->request->post,function($key) use ($model){
            if( !in_array($key, $model->getAllowedFilters()))
                return false;
        },ARRAY_FILTER_USE_KEY);
        return $model->search($filters);
    }

    public function actionCreate()
    {

    }

    public function actionSave()
    {
    }
}