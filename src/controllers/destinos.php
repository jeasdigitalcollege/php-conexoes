<?php
    // Arquivo: destinos.php
    // ==================================================================

    // Diretiva PHP declare(strict_types)
    // Força verificações rigorosas de tipos nas funções 
    // definidas (view) dentro do escopo em que ela é declarada
    declare(strict_types=1);

    // route /destinos/listar
    // Função para listar destinos
    function destinos_listar(): void
    {
        $dados = conexao()->query('SELECT * FROM tb_destinos');

        view('destinos_listar', $dados->fetchAll());
    }

    // route /destinos/adicionar
    // Função para adicionar destinos
    function destinos_cadastrar(): void
    {
        if ($_POST) {
            $nome = request_input('nome');
            $cidade = request_input('cidade');
            $avaliacao = request_input('avaliacao');

            $data = date('d/m/Y');

            $query = "INSERT INTO tb_destinos 
                            (nome, cidade, avaliacao, data_cadastro, data_edicao) 
                    VALUES (:nome, :cidade, :avaliacao, :data_cadastro, :data_edicao)";

            $sql = conexao()->prepare($query);

            $sql->execute([
                ':nome' => $nome,
                ':cidade' => $cidade,
                ':avaliacao' => $avaliacao,
                ':data_cadastro' => $data,
                ':data_edicao' => $data,
            ]);

            //redirecionar
            header('location: /destinos/listar');
        } 

        view('destinos_cadastrar');
    }

    // route /destinos/excluir
    // Função para excluir destinos
    function destinos_excluir(): void
    {
        $id = $_GET['id'];
        $sql = "DELETE FROM tb_destinos WHERE id='{$id}'";

        conexao()->query($sql);

        header('location: /destinos/listar');
    }
    
    // route /destinos/editar
    // Função para editar destinos
    function destinos_editar(): void
    {
        if ($_POST) {
            $local = $_POST['local'];
            $cidade = $_POST['cidade'];
            $avaliacao = $_POST['pais'];
            $id = $_GET['id'];

            $sql = "UPDATE tb_destinos 
                    SET local='{$local}', cidade='{$cidade}', pais='{$avaliacao}' 
                    WHERE id='{$id}'";

            conexao()->query($sql);

            header('location: /destinos/listar');
        }

        $id = $_GET['id'];
        $dados = conexao()->query("SELECT * FROM tb_destinos WHERE id='{$id}'");

        view('destinos_editar', $dados->fetchObject());
    }


