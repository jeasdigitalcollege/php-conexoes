<?php
    // Arquivo: conexoes_listar.php
    // ==================================================================
?>

<hr>
<div class="processo">
    <span>Listagem de Conexões</span>
    <nav>
        <?php 
            $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        ?>
        <a class="btn <?php echo $url === '/conexoes/cadastrar' ? 'btn-dark' : 'btn-outline-dark';  ?>" href="/conexoes/cadastrar">Nova Conexão</a>
    </nav>
</div>
<hr>

<table class="table table-striped table-hover">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Ações</th>
        </tr>
    </thead>
    
    <tbody>
        <?php
            foreach ($dados as $cada) {
                $id = $cada['id'];

                $telefone = formatar_telefone($cada['telefone']);

                echo "
                    <tr>
                        <td>{$id}</td>
                        <td>{$cada['nome']}</td>
                        <td>{$cada['email']}</td>
                        <td>{$telefone}</td>

                        <td>
                            <ul>
                                <li><a href='/conexoes/consultar?id={$id}'><img src='/assets/images/search.svg' alt='consultar'></a></li>
                                <li><a href='/conexoes/editar?id={$id}'><img src='/assets/images/edit.svg' alt='editar'></a></li>
                                <li><a href='#' onclick='excluir({$id})'><img src='/assets/images/delete.svg' alt='editar'></a></li>
                            </ul>
                        </td>
                    </tr>
                ";
            }
        ?>
    </tbody>
</table>

<script>
    function excluir(id) {
       
        let resposta = confirm('Voce tem certeza?');

        if (resposta === true) {
            location.href = '/conexoes/excluir?id='+id;
        }
    }
</script>

<?php
function formatar_telefone($telefone) {
    // Remove qualquer caractere não numérico
    $telefone = preg_replace('/\D/', '', $telefone);

    // Verifica se o número possui 11 dígitos (para o formato (99) 9.9999-9999)
    if (strlen($telefone) == 11) {
        return '(' . substr($telefone, 0, 2) . ') ' . substr($telefone, 2, 1) . '.' . substr($telefone, 3, 4) . '-' . substr($telefone, 7);
    }

    // Se o número não estiver no formato esperado, retorna o número original
    return $telefone;
}
?>