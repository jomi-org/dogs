<?php
/**
 * Created by PhpStorm.
 * User: macseem
 * Date: 1/24/15
 * Time: 12:43 AM
 */

return array(
    'controllerNamespace' => 'app\\commands\\',
    'modules' => array(
        'router' => array(
            'class' => \jf\modules\Router::class,
            'default' => array(
                'controller' => 'user',
                'action' => 'signUp'
            ),
            'routes' => [
                '/(.+?)\/(.+)$/' => [
                    'matches' => [
                        '1' => 'controller',
                        '2' => 'action'
                    ]
                ],
                '!(.+)!' => [
                    'matches' => [
                        '1' => 'controller',
                    ],
                    'default' => [
                        'action' => 'index'
                    ]
                ]
            ],
        ),
        'request' => array(
            'class' => \jf\modules\ConsoleRequest::class,
            'argv' => $argv,
        ),
        'response' => array(
            'class' => \jf\modules\Response::class
        ),
        'db' => array(
            'class' => \jf\modules\Db::class,
            'dsn' => 'mysql:host=localhost;dbname=users',
            'username' => 'users',
            'password' => '1q2w3e'
        )
    ),
    'params' => array()
);