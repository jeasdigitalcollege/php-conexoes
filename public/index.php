<?php
// Arquivo: index.php
// ==================================================================

// Diretiva PHP declare(strict_types)
// Força verificações rigorosas de tipos nas funções 
// definidas (view) dentro do escopo em que ela é declarada

declare(strict_types=1);

// Inclui o conteúdo do arquivo especificado (routes.php)
include '../config/routes.php';

// Função para mostrar a página gerada para o usuário de acordo com a opção escolhida.
// Função sem retorno (void)
// Inclui o arquivos:
//  arquivo com o cabeçalho da página (head.php)
//  arquivo com a ação selecionada pelo usuário (listar, cadastrar, etc.)
//  arquivo com o footer da página (footer.php) 
// Tipo de dados mixed:
//  O tipo mixed no PHP é bastante versátil e aceita todos os valores. 
//  Ele é equivalente a uma união de tipos, incluindo object, resource, array, string, float, int, bool e null1. 
//  Na teoria dos tipos, o mixed é considerado o tipo universal, 
//  o que significa que todos os outros tipos são subtipos dele.
function view(string $name, mixed $dados = []): void
{
    include '../src/views/_template/head.php';
    include "../src/views/{$name}.php";
    include '../src/views/_template/footer.php';
}

// Função para criar uma conexão com o Banco de Dados MySQL
function conexao(): PDO
{
    return include '../src/conexao.php';
}

function request_input(string $nome): mixed
{
    return htmlspecialchars($_POST[$nome] ?? $_GET[$nome]);
    // strip_tags não é recomendada para tratar XSS
    // return strip_tags($_POST[$nome]);
}
