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
            'class' => \framework\modules\ConsoleRequest::class
        ),
        'response' => array(
            'class' => \framework\modules\Response::class
        ),
        'db' => array(
            'class' => \framework\modules\Db::class,
            'dsn' => 'mysql:host=localhost;dbname=users',
            'username' => 'users',
            'password' => '1q2w3e'
        )
    ),
    'params' => array()
);