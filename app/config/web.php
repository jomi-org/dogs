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
            'class' => \jf\modules\Router::class,
            'default' => array(
                'controller' => 'user',
                'action' => 'signUp',
                'route' => 'users/index'
            )
        ),
        'request' => array(
            'class' => \jf\modules\Request::class
        ),
        'response' => array(
            'class' => \jf\modules\Response::class
        ),
        'db' => array(
            'class' => \jf\modules\Db::class,
            'dsn' => 'mysql:host=localhost;dbname=users',
            'username' => 'users',
            'password' => '1q2w3e'
        ),
        'user' => array(
            'class' => \jf\modules\User::class,
        )
    ),
    'params' => array()
);