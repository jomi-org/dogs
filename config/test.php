<?php

return array(
    'modules' => array(
        'router' => array(
            'class' => \framework\modules\Router::class,
            'default' => array(
                'controller' => 'test',
                'action' => 'test'
            ),
            'controller' => array(
                'default' => array(
                    'action' => 'action'
                )
            )
        ),
        'request' => array(
            'class' => \framework\modules\Request::class
        )
    ),
    'params' => array(
        'test' => '123test',
        'test2' => array('test3' => array('test4' => 'testParamString')),
    )
);