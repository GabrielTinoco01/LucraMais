<?php

require_once __DIR__ . '/../routes/web.php';

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$base = '/projeto_integrador/lucra+/public';

$rota = str_replace($base, '', $url);

if ($rota === '') {
    $rota = '/';
}

if (isset($rotas[$rota])) {

    $controllerNome = $rotas[$rota]['controller'];
    $action = $rotas[$rota]['action'];

    $controllerArquivo = __DIR__ .
        '/../app/controllers/' .
        $controllerNome .
        '.php';

    if (!file_exists($controllerArquivo)) {
        http_response_code(404);
        exit('Controller não encontrado.');
    }

    require_once $controllerArquivo;

    $controller = new $controllerNome();

    if (!method_exists($controller, $action)) {
        http_response_code(404);
        exit('Ação não encontrada.');
    }

    $controller->$action();

} else {

    http_response_code(404);

    echo "Página não encontrada.";
}