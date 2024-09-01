<?php
    // Arquivo: conexoes.php
    // ==================================================================

    // Diretiva PHP declare(strict_types)
    // Força verificações rigorosas de tipos nas funções 
    // definidas (view) dentro do escopo em que ela é declarada
    declare(strict_types=1);

    // route /conexoes/listar
    // Função para listar conexoes
    function conexoes_listar(): void
    {
        $dados = conexao()->query('SELECT * FROM tb_conexoes');

        view('conexoes_listar', $dados->fetchAll());
    }

    // route /conexoes/cadastrar
    // Função para adicionar conexoes
    function conexoes_cadastrar(): void
    {
        if ($_POST) {
            // strip_tags evita ataques utilizando os campos
            // A função strip_tags() retira uma string de tags HTML, XML e PHP.
            $nome = request_input('nome');
            $email = request_input('email');
            $telefone = request_input('telefone');

            $data = date('d/m/Y');

            $query = "INSERT INTO tb_conexoes 
                    (nome, email, telefone, data_cadastro, data_edicao) 
                    VALUES (:nome, :email, :tel, :data_cadastro, :data_edicao)";

            $sql = conexao()->prepare($query);

            $sql->execute([
                ':nome' => $nome,
                ':email' => $email,
                ':tel' => $telefone,
                ':data_cadastro' => $data,
                ':data_edicao' => $data,
            ]);

            //redirecionar
            //header('location: /conexoes/listar');
        } 

        view('conexoes_cadastrar');
    }

    // route /conexoes/excluir
    // Função para excluir conexoes
    function conexoes_excluir(): void
    {
        $id = $_GET['id'];
        $sql = "DELETE FROM tb_conexoes WHERE id='{$id}'";

        conexao()->query($sql);

        header('location: /conexoes/listar');
    }
    
    // route /conexoes/editar
    // Função para editar conexoes
    function conexoes_editar(): void
    {
        if ($_POST) {
            $nome = request_input('nome');
            $email = request_input('email');
            $telefone = request_input('telefone');
            $id = request_input('id');

            // Corrija o formato da data para 'Y-m-d' (ano-mês-dia)
            $data_atual = date('d-m-Y');

            $query = "UPDATE tb_conexoes
            SET nome=:nome, email=:email, telefone=:tel, data_edicao=:data_edicao
            WHERE id=:id";


            $sql = conexao()->prepare($query);

            $sql->execute([
                ':nome' => $nome,
                ':email' => $email,
                ':tel' => $telefone,
                ':data_edicao' => $data_atual,
                ':id' => $id
            ]);

            //header('location: /conexoes/listar');
        }

        $id = $_GET['id'];
        $dados = conexao() ->query("SELECT * FROM tb_conexoes WHERE id ='{$id}'");

        view('conexoes_editar', $dados->fetchObject());
    }

    // route /conexoes/consultar
    // Função para consultar conexoes
    function conexoes_consultar(): void
    {
        $id = $_GET['id'];
        $dados = conexao() ->query("SELECT * FROM tb_conexoes WHERE id ='{$id}'");

        view('conexoes_consultar', $dados->fetchObject());
    }


