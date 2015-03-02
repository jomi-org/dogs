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
                'route' => '/site/home',
                'controller-action' => [
                    'breed' => 'catalog'
                ]
            ),

            'routes' => [
                '/\/(.+?)\/(.+?)\/(.+)/' => [
                    'matches' => [
                        '1' => 'module',
                        '2' => 'controller',
                        '3' => 'action'
                    ]
                ],
                '/\/(.+?)\/(.+)/' => [

                    'matches' => [
                        '1' => 'controller',
                        '2' => 'action'
                    ],
                    'default' => [
                        'action' => 'index'
                    ]
                ],
                '/\//' => [
                    'params' => [],
                    'matches' => [],
                    'default' => [
                        'controller' => 'user',
                        'action' => 'sign-up',
                    ]
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
        ],
        'apiv1' => [
            'controllerNamespace' => '\\app\\modules\\api\\v1\\controllers\\'
        ],
        'control' => [
            'class' => \jf\modules\Control::class,
        ],
        'controlStorage' => [
            'class' => \jf\modules\ConfigControlStorage::class,
            'permissions' => [
                '\\breed' => [
                    '*' => [ 'catalog'=>true, 'edit' => false, 'view' => true, 'create' => true ],
                ]
            ]
        ]
    ),
    'params' => array()
);