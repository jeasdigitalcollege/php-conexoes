<?php
    // Arquivo: conexoes_consultar.php
    // ==================================================================
?>

<hr>
<div class="processo">
    <span>Consulta de Conexão</span>
</div>
<hr>

<section class="row">
    <div class="col">
        <div class="card card-body"> 
            <div id="erros">

            </div>

            <form action="">
                <label for="">Chave</label>
                <input value="<?=$dados->id;?>" id="chave" type="text" name="chave" class="form-control mb-3" disabled>

                <label for="">Nome</label>
                <input value="<?=$dados->nome;?>" id="input_nome" type="text" name="nome" class="form-control mb-3" disabled>

                <label for="">Email</label>
                <input value="<?=$dados->email;?>" type="text" name="email" class="form-control mb-3" disabled>

                <label for="">Telefone</label>
                <input value="<?= formatar_telefone($dados->telefone); ?>" type="text" name="telefone" class="form-control mb-3" disabled>

                <label for="">Data Cadastro:</label>
                <input value="<?=$dados->data_cadastro?>" type="text" name="data_cadastro" class="form-control mb-3" disabled>

                <label for="">Data Edição:</label>
                <input value="<?=$dados->data_edicao?>" type="text" name="data_edicao" class="form-control mb-3" disabled>

            </form>
        </div>
    </div>

    <div class="col"></div>
</section>

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