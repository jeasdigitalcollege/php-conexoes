<?php
    // Arquivo: routes.php
    // ==================================================================

    // Inclui o conteúdo dos arquivos:
    //  conexoes.php: contém as funções do CRUD de conexoes 
    //  destinos.php: contém as funções do CRUD de destinos
    include '../src/controllers/conexoes.php';
    include '../src/controllers/destinos.php';

    // $_SERVER['REQUEST_URI']
    // É uma variável superglobal que contém a parte do URI (Uniform Resource Identifier) após o nome do host (domínio).
    // URI = é a parte da URL que vem após o domínio, incluindo o caminho, os parâmetros e a âncora.
    // parse_url
    // É uma função PHP que analisa uma URL e retorna um array associativo contendo os diferentes componentes da URL.
    // O segundo parâmetro, PHP_URL_PATH, especifica que queremos apenas a parte do caminho da URL.
    $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    // Controle de execução de Rotas
    // O comando match foi introduzido no PHP 8 como uma alternativa mais concisa e expressiva ao tradicional switch. 
    // Ele permite que você compare uma expressão contra vários padrões e execute o código correspondente.
    $controller = match ($url) {

        // '/' = Rota
        // 'conexoes_listar' = Função que será executada
        '/' => 'conexoes_listar',

        '/conexoes/listar' => 'conexoes_listar',
        '/conexoes/cadastrar' => 'conexoes_cadastrar',
        '/conexoes/consultar' => 'conexoes_consultar',
        '/conexoes/editar' => 'conexoes_editar',
        '/conexoes/excluir' => 'conexoes_excluir',

        '/destinos/listar' => 'destinos_listar',
        '/destinos/cadastrar' => 'destinos_cadastrar',
        '/destinos/editar' => 'destinos_editar',
        '/destinos/excluir' => 'destinos_excluir',

        default => null,
    };

    if ($controller !== null) {
        // $controller() executa a função armazenada em $controller
        // Variáveis de Função em PHP
        // Essa flexibilidade é possível graças a uma característica do PHP chamada resolução de nomes dinâmicos. 
        // Quando você usa parênteses () após uma variável, PHP tenta interpretar o conteúdo da variável 
        // como o nome de uma função e executá-la.
        $controller();
        exit;
    }


    echo 'Pagina nao encontrada';

/*
    Esse código demonstra um mecanismo básico de roteamento em PHP, 
    utilizando a estrutura match para mapear URLs para funções. 
    Ele é uma boa base para construir sistemas mais complexos, 
    mas pode ser necessário adaptá-lo para atender às necessidades 
    específicas de cada aplicação.
*/
