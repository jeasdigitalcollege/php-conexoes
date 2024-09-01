<?php
// Inicializando variáveis
$nome = ""; 
$email = "";
$telefone = "";
$erroNome = "";
$sucesso = false;

// Verifica se o formulário foi enviado (Só passa aqui na Volta do Formulário)
if ($_SERVER["REQUEST_METHOD"] == "POST") {    

    if (empty($_POST["nome"])) {
        $erroNome = ">>> Informe o Nome da Conexão.";
    } elseif (strlen($_POST["nome"]) < 3) {
        $erroNome = ">>> O nome deve ter mais de 3 caracteres.";
    } else {
        $nome = $_POST["nome"];
    }

    // Se não há erros, você pode processar o formulário
    if (empty($erroNome)) {
        // Processar o formulário (salvar no banco de dados, etc.)
        // echo "Formulário enviado com sucesso!";
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $telefone = $_POST["telefone"];
        $erroNome = "*** Registro Incluído com Sucesso!";
        $sucesso = true;
    }
}
?>

<hr>
<div class="processo">
    <span>Cadastro de Conexão</span>
</div>
<hr>

<section class="row">
    <div class="col">
        <div class="card card-body"> 
            <form action="" method="post" onsubmit="validarFormulario(event)">
                <label for="input_nome">Nome</label>
                <input id="input_nome" type="text" name="nome" class="form-control mb-3" value=<?=$nome;?>>
                
                <label for="input_email">Email</label>
                <input id="input_email" type="text" name="email" class="form-control mb-3" value=<?=$email;?>>

                <label for="input_telefone">Telefone</label>
                <input id="input_telefone" type="text" name="telefone" class="form-control mb-3" value=<?=$telefone;?>>
 
                <div id="erros">
                    <?php if (!empty($erroNome)): ?>
                        <p style="color:red;"><?php echo $erroNome; ?></p>  
                    <?php endif; ?>
                </div>

                <button <?php if ($sucesso === true) { echo "disabled";}?> id="btn_enviar" class="btn btn-dark w-100">Cadastrar</button>
            </form>
        </div>
    </div>
    <div class="col"></div>
</section>

<script>
    function validarFormulario(event) {
        const nome = document.getElementById('input_nome').value;
        const email = document.getElementById('input_email').value;
        const telefone = document.getElementById('input_telefone').value;
        const errosDiv = document.getElementById('erros');
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        errosDiv.innerHTML = ''; // Limpa as mensagens de erro anteriores

        // Validação do campo nome
        if (nome === '') {
            errosDiv.innerHTML += '<p style="color:red;">>>> Informe o Nome da Conexão.</p>';
            document.getElementById('input_nome').focus();
            event.preventDefault(); // Impede o envio do formulário
            return false;
        } else if (nome.length < 3) {
            errosDiv.innerHTML += '<p style="color:red;">>>> O nome deve ter mais de 3 caracteres.</p>';
            document.getElementById('input_nome').focus();
            event.preventDefault();
            return false;
        }

        // Validação do campo email (somente se o nome estiver válido)
        if (email === '') {
            errosDiv.innerHTML += '<p style="color:red;">>>> Informe o campo de Email.</p>';
            document.getElementById('input_email').focus();
            event.preventDefault();
            return false;
        } else if (!emailRegex.test(email)) {
            errosDiv.innerHTML += '<p style="color:red;">>>> Digite um endereço de e-mail válido.</p>';
            document.getElementById('input_email').focus();
            event.preventDefault();
            return false;
        } 

        // Validação do campo telefone (somente se o nome e o email estiverem válidos)
        if (telefone === '') {
            errosDiv.innerHTML += '<p style="color:red;">>>> Informe o Número do Telefone.</p>';
            document.getElementById('input_telefone').focus();
            event.preventDefault();
            return false;
        } else if (telefone.length < 11) {
            errosDiv.innerHTML += '<p style="color:red;">>>> O campo Telefone tem menos que 11 dígitos: (DDD) + Número.</p>';
            document.getElementById('input_telefone').focus();
            event.preventDefault();
            return false;
        }else if (telefone.length > 11) {
            errosDiv.innerHTML += '<p style="color:red;">>>> O campo Telefone tem mais que 11 dígitos: (DDD) + Número.</p>';
            document.getElementById('input_telefone').focus();
            event.preventDefault();
            return false;
        }

        return true;
    }

</script>
