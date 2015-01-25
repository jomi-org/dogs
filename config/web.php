<?php
/**
 * Created by PhpStorm.
 * User: macseem
 * Date: 1/24/15
 * Time: 12:43 AM
 */
return array(
    'modules' => array(
        'router' => array(
            'class' => \framework\modules\Router::class,
            'default' => array(
                'controller' => 'user',
                'action' => 'signUp'
            )
        ),
        'request' => array(
            'class' => \framework\modules\Request::class
        ),
        'response' => array(
            'class' => \framework\modules\Response::class
        )
    ),
    'params' => array()
);