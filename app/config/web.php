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
                'controller' => 'site',
                'action' => 'home',
                'route' => '/site/home'
            ),
            'breeds' => [
                'default' => [
                    'action' => 'catalog'
                ]
            ]
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
        ),
        'session' => [
            'class' => \jf\modules\Session::class,
        ]
    ),
    'params' => array()
);