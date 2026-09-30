<?php

require_once __DIR__ . '/../routes/web.php';

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$base = '/projeto_integrador/lucra+/public';

$rota = str_replace($base, '', $url);

if ($rota === '') {
    $rota = '/';
}

$method = $_SERVER['REQUEST_METHOD'];

if (
    !isset($rotas[$method]) ||
    !isset($rotas[$method][$rota])
) {
    http_response_code(404);
    exit('Página não encontrada.');
}

$rotaConfig = $rotas[$method][$rota];

$controllerNome = $rotaConfig['controller'];
$action = $rotaConfig['action'];

$controllerArquivo = __DIR__
    . '/../app/controllers/'
    . $controllerNome
    . '.php';

if (!file_exists($controllerArquivo)) {
    http_response_code(404);
    exit('Controller não encontrado.');
}

require_once $controllerArquivo;

/*
 * Quando o Controller está dentro de uma pasta,
 * por exemplo:
 *
 * Financeiro/MovimentoController
 *
 * o nome da classe continua sendo:
 *
 * MovimentoController
 */
$partesController = explode('/', $controllerNome);

$classeController = end($partesController);

if (!class_exists($classeController)) {
    http_response_code(404);
    exit('Classe do Controller não encontrada.');
}

$controller = new $classeController();

if (!method_exists($controller, $action)) {
    http_response_code(404);
    exit('Ação não encontrada.');
}

$controller->$action();