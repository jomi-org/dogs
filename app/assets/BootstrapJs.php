<?php
/**
 * Created by PhpStorm.
 * User: macseem
 * Date: 1/25/15
 * Time: 5:14 PM
 */

namespace app\assets;


use jf\Asset;

class BootstrapJs extends Asset {


    public $js = [
        'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js'
    ];
    public $depend = [
        Jquery::class
    ];
}