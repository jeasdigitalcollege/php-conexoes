<?php

include '../src/controllers/lugares.php';

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$controller = match ($url) {
    '/lugares/listar' => 'lugares_listar',
    '/lugares/excluir' => 'lugares_excluir',
    '/lugares/editar' => 'lugares_editar',
    '/lugares/adicionar' => 'lugares_add',
    default => null,
};

if ($controller !== null) {
    $controller();
    exit;
}
