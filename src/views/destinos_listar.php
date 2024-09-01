<?php
    // Arquivo: destinos_listar.php
    // ==================================================================
?>

<hr>
<div class="processo">
    <span>Listagem de Destinos</span>
    <nav>
        <?php 
            $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        ?>
        <a class="btn <?php echo $url === '/destinos/cadastrar' ? 'btn-dark' : 'btn-outline-dark';  ?>" href="/destinos/cadastrar">Novo Destino</a>
    </nav>
</div>
<hr>

<table class="table table-striped table-hover">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Cidade</th>
            <th>UF</th>
            <th>Avaliação</th>
            <th>Ações</th>
        </tr>
    </thead>

    <tbody>
        <?php
            foreach ($dados as $cada) {
                $id = $cada['id'];
                $avaliacao = $cada['avaliacao'];

                echo "<tr>
                        <td>{$id}</td>
                        <td>{$cada['nome']}</td>
                        <td>{$cada['cidade']}</td>
                        <td>{$cada['uf']}</td>
                        <td class='avaliacao'>";

                            for ($i = 1; $i <= 5; $i++) {
                                $class = ($i <= $avaliacao) ? 'star filled' : 'star'; 
                                echo "<span class='{$class}'>&#9733;</span>"; // &#9733; é o código HTML para a estrela
                            }

                echo   "</td>

                        <td>
                            <ul>
                                <li><a href='/destinos/consultar?id={$id}'><img src='/assets/images/search.svg' alt='consultar'></a></li>
                                <li><a href='/destinos/editar?id={$id}'><img src='/assets/images/edit.svg' alt='editar'></a></li>
                                <li><a href='#' onclick='excluir({$id})'><img src='/assets/images/delete.svg' alt='editar'></a></li>
                            </ul>
                        </td>
                    </tr>";
            };
        ?>
    </tbody>
</table>

<script>
    function excluir(id) {
        let resposta = confirm('Voce tem certeza?');

        if (resposta === true) {
            location.href = '/destinos/excluir?id='+id;
        }
    }
</script>
