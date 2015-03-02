<?php
/**
 * Created by PhpStorm.
 * User: macseem
 * Date: 1/25/15
 * Time: 8:36 PM
 */

namespace app\assets;


use jf\Asset;

class Breed extends Asset{

    public $css = [
    ];

    public $js = [
        '/js/breed.js'
    ];

    public $depend = [
        BootstrapJs::class,
    ];
}