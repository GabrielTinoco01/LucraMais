<?php

$rotas = [
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
    ]
];