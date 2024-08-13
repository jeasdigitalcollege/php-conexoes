<?php

include '../config/routes.php';

//pegando a url que o usuario acessou
$url = explode('?', $_SERVER['REQUEST_URI'])[0];
// $url = parse_url('/excluir?id=1234', PHP_URL_PATH);


if ($url === '/editar') {
    if ($_POST) {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $id = $_GET['id'];

        $sql = "UPDATE tb_contatos 
                SET nome='{$nome}', email='{$email}', telefone='{$telefone}' 
                WHERE id='{$id}'";

        $conexao = include '../src/conexao.php';
        $conexao->query($sql);

        header('location: /listar');
    }

    view('editar');
} else if ($url === '/excluir') {
    $id = $_GET['id'];
    $sql = "DELETE FROM tb_contatos WHERE id='{$id}'";

    $conexao = include '../src/conexao.php';
    $conexao->query($sql);

    header('location: /listar');
} else if ($url === '/listar' || $url === '/') {
    view('listar');
} else if ($url === '/cadastro') {

    if ($_POST) {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];

        $data = date('d/m/Y');

        $conexao = require_once '../src/conexao.php';

        $conexao->query("
            INSERT INTO tb_contatos (nome, email, telefone, data_cadastro)
            VALUES ('{$nome}', '{$email}', '{$telefone}', '{$data}')
        "); 

        //redirecionar
        header('location: /listar');
    } 

    view('cadastro');
} else {
    echo "Pagina nao encontrada";
}

function view(string $name): void
{
    // include: ele tenta, se der erro, ele continua a aplicacao
    // require: ele tenta, se der erro, ele para a aplicacao
    // *_once: ele so inclui o arquivo uma vez

    include '../src/views/_template/head.php';
    include "../src/views/{$name}.php";
    include '../src/views/_template/footer.php';
}




