<?php
/**
 * Created by PhpStorm.
 * User: macseem
 * Date: 1/25/15
 * Time: 3:20 PM
 */

namespace framework\controllers;


use framework\Controller;
use framework\Core;
use framework\View;

class ErrorController extends Controller {

    public function actionException(\Exception $e)
    {
        $file = Core::$baseDir . '/framework/views/error/exception.php';
        return View::getInstance()->render($file,array('e' => $e));
    }

}