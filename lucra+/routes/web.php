<?php

$rotas = [
    'GET' => [
        '/' => [
            'controller' => 'HomeController',
            'action' => 'index'
        ],

        '/login' => [
            'controller' => 'AuthController',
            'action' => 'login'
        ],

        '/cadastro' => [
            'controller' => 'AuthController',
            'action' => 'cadastro'
        ],

        '/logout' => [
            'controller' => 'AuthController',
            'action' => 'logout'
        ]
    ],

    'POST' => [
        '/login' => [
            'controller' => 'AuthController',
            'action' => 'autenticar'
        ],

        '/cadastro' => [
            'controller' => 'AuthController',
            'action' => 'cadastrar'
        ]
    ]
];