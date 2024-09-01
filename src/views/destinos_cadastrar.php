<?php
    // Arquivo: destinos_cadastrar.php
    // ==================================================================
?>

<section class="row">
    <div class="col">
        <div class="card card-body"> 
            <div id="erros">

            </div>

            <div>
                <h3>Cadastrar Lugar</h3>
            </div>

            <form action="" method="post">
                <label for="">Nome</label>
                <input id="input_local" type="text" name="nome" class="form-control mb-3">

                <label for="">Cidade</label>
                <input type="text" name="cidade" class="form-control mb-3">

                <label for="avaliacao">Avaliação</label>
                <input type="text" name="avaliacao" id="avaliacao "class="form-control mb-3">

                <!-- Fazer um select aqui para avaliação -->

                <button id="btn_enviar"" class="btn btn-dark w-100">Salvar</button>
            </form>
        </div>
    </div>
    <div class="col">

    </div>
</section>


<script>
    input_local.addEventListener('blur', () => {
        if (input_local.value === '') {
            erros.innerHTML = `<div class="alert alert-danger">Local Inválido</div>`;

            input_local.classList.add('is-invalid');
            btn_enviar.setAttribute('disabled', 'disabled');
        } else {
            erros.innerHTML = '';

            input_local.classList.remove('is-invalid');
            input_local.classList.add('is-valid');
            btn_enviar.removeAttribute('disabled');
        }
    });
</script>
