<?php

declare(strict_types=1);

// /contatos/listar
function contatos_listar(): void
{
    $dados = conexao()->query('SELECT * FROM tb_contatos');

    view('listar', $dados->fetchAll());
}

function contatos_add(): void
{
    if ($_POST) {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];

        $data = date('d/m/Y');

        conexao()->query("
            INSERT INTO tb_contatos (nome, email, telefone, data_cadastro)
            VALUES ('{$nome}', '{$email}', '{$telefone}', '{$data}')
        "); 

        //redirecionar
        header('location: /contatos/listar');
    } 

    view('cadastro');
}

function contatos_excluir(): void
{
    $id = $_GET['id'];
    $sql = "DELETE FROM tb_contatos WHERE id='{$id}'";

    conexao()->query($sql);

    header('location: /contatos/listar');
}

function contatos_editar(): void
{
    if ($_POST) {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $id = $_GET['id'];

        $sql = "UPDATE tb_contatos 
                SET nome='{$nome}', email='{$email}', telefone='{$telefone}' 
                WHERE id='{$id}'";

        conexao()->query($sql);

        header('location: /contatos/listar');
    }

    $id = $_GET['id'];
    $dados = conexao()->query("SELECT * FROM tb_contatos WHERE id='{$id}'");

    view('editar', $dados->fetchObject());
}


