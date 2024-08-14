<section class="row">
    <div class="col">
        <div class="card card-body"> 
            <div id="erros">

            </div>

            <div>
                <h3>Editar Contato</h3>
            </div>

            <form action="" method="post">
                <label for="">Nome</label>
                <input value="<?=$dados->nome;?>" id="input_nome" type="text" name="nome" class="form-control mb-3">

                <label for="">Email</label>
                <input value="<?=$dados->email;?>" type="text" name="email" class="form-control mb-3">

                <label for="">Telefone</label>
                <input value="<?=$dados->telefone;?>" type="text" name="telefone" class="form-control mb-3">

                <button id="btn_enviar"" class="btn btn-dark w-100">PRONTO</button>
            </form>
        </div>
    </div>
    <div class="col">

    </div>
</section>