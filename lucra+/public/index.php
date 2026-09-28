<?php

// Carrega as rotas da aplicação.
require_once __DIR__ . '/../routes/web.php';

// Pega o caminho da URL atual.
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Caminho base onde o projeto está instalado.
$base = '/projeto_integrador/lucra+/public';

// Remove o caminho base da URL.
$rota = str_replace($base, '', $url);

// Se a URL não tiver uma rota específica,
// considera a página inicial.
if ($rota === '') {
    $rota = '/';
}

// Identifica o método HTTP utilizado.
// Exemplo: GET, POST.
$method = $_SERVER['REQUEST_METHOD'];

// Verifica se existe uma definição de rotas
// para o método HTTP utilizado.
if (
    !isset($rotas[$method]) ||
    !isset($rotas[$method][$rota])
) {
    http_response_code(404);
    exit('Página não encontrada.');
}

// Pega as informações da rota.
$rotaConfig = $rotas[$method][$rota];

$controllerNome = $rotaConfig['controller'];
$action = $rotaConfig['action'];

// Monta o caminho do arquivo do controller.
$controllerArquivo = __DIR__
    . '/../app/controllers/'
    . $controllerNome
    . '.php';

// Verifica se o controller existe.
if (!file_exists($controllerArquivo)) {
    http_response_code(404);
    exit('Controller não encontrado.');
}

// Carrega o controller.
require_once $controllerArquivo;

// Cria uma instância do controller.
$controller = new $controllerNome();

// Verifica se a ação existe.
if (!method_exists($controller, $action)) {
    http_response_code(404);
    exit('Ação não encontrada.');
}

// Executa a ação.
$controller->$action();