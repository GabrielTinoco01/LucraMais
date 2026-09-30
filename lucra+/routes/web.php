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
        ],

        /*
         * =========================
         * FINANCEIRO
         * =========================
         */

        '/financeiro' => [
            'controller' => 'Financeiro/MovimentoController',
            'action' => 'index'
        ],

        '/financeiro/criar' => [
            'controller' => 'Financeiro/MovimentoController',
            'action' => 'criar'
        ],

        '/financeiro/detalhes' => [
            'controller' => 'Financeiro/MovimentoController',
            'action' => 'detalhes'
        ],

        /*
         * =========================
         * CATEGORIAS
         * =========================
         */

        '/categorias' => [
            'controller' => 'Categorias/CategoriaFinanceiraController',
            'action' => 'index'
        ],

        '/categorias/criar' => [
            'controller' => 'Categorias/CategoriaFinanceiraController',
            'action' => 'criar'
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
        ],

        /*
         * =========================
         * FINANCEIRO
         * =========================
         */

        '/financeiro/criar' => [
            'controller' => 'Financeiro/MovimentoController',
            'action' => 'salvar'
        ],

        /*
         * =========================
         * CATEGORIAS
         * =========================
         */

        '/categorias/criar' => [
            'controller' => 'Categorias/CategoriaFinanceiraController',
            'action' => 'salvar'
        ]

    ]
];