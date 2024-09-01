<?php
    // Arquivo: conexao.php
    // ==================================================================

    // Cria uma conexão com um banco de dados MySQL usando a classe PDO. 
    // A instância criada pode ser usada posteriormente para executar consultas e 
    // operações no banco de dados.
    // 'mysql:host=setup-mysql;dbname=db_name': Esse é o DSN (Data Source Name), 
    // que especifica o host (no exemplo, setup-mysql) e o 
    // nome do banco de dados (no exemplo, db_name).
    // 'user': Nome de usuário usado para autenticação no banco de dados.
    // 'password': Senha usada para autenticação no banco de dados.
    return new PDO('mysql:host=setup-mysql;dbname=db_name', 'user', 'password');

