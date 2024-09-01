<?php
    // Arquivo: destinos_editar.php
    // ==================================================================
?>

<section class="row">
    <div class="col">
        <div class="card card-body"> 
            <div id="erros">

            </div>

            <div>
                <h3>Editar Destino</h3>
            </div>

            <form action="" method="post">
                <label for="">Local</label>
                <input value="<?=$dados->local;?>" id="input_local" type="text" name="local" class="form-control mb-3">

                <label for="">Cidade</label>
                <input value="<?=$dados->cidade;?>" type="text" name="cidade" class="form-control mb-3">

                <label for="">País</label>
                <input value="<?=$dados->pais;?>" type="text" name="pais" class="form-control mb-3">

                <button id="btn_enviar"" class="btn btn-dark w-100">Salvar</button>
            </form>
        </div>
    </div>
    <div class="col">

    </div>
</section>