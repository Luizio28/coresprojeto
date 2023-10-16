<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php
    include "../_templates/echoer.php";
    include "../_templates/head.php";

    head_constructor("sign-up");
    ?>

    <meta name="description" id="description" content="Seja bem-vindo! Essa é a página criação de conta do site de requerimentos da CORES do IFBA Campus Eunápolis">
</head>


<body>
    <?php
    include "../_templates/header.php";
    ?>

    <main>
        <div class="flex-column">
            <h1>Bem-vindo!</h1>
            <form id="create-new" class="center-flex flex-column box flex-column" method="post">

                <div class="flex-row spaced-between">
                    <label for="id"> N° de matrícula</label>
                    <input maxlength="12" type="text" name="id" id="id" required>
                </div>

                <div class="flex-row spaced-between">
                    <label for="nome">Nome Completo</label>
                    <input maxlength="255" type="text" name="nome" id="nome" required>
                </div>

                <div class="flex-row spaced-between">
                    <label for="email">Email</label>
                    <input maxlength="255" type="email" name="email" id="email" required>
                </div>

                <div class="flex-row spaced-between">
                    <label for="fone"> N° telefone (whatsapp)</label>
                    <input maxlength="11" type="tel" name="fone" id="fone" required>
                </div>

                <div class="flex-row spaced-between">
                    <?php 
                        include "../_scripts/get_turma.php";
                    ?>
                </div>

                <div class="flex-row spaced-between">
                    <label for="psswd">Senha</label>
                    <input maxlength="255" type="password" name="psswd" id="psswd" required>
                </div>

                <div class="flex-row spaced-between">
                    <label for="psswd">Confirmar senha</label>
                    <input maxlength="255" type="password" name="psswd2" id="psswd2" required>
                </div>

                <div class="flex-row spaced-between">
                    <div id="resultado"></div>
                </div>
                
                <div>
                    <input type="submit" name="send" id="send" value="criar" disabled>
                    <a href="../sign-in/">Já tenho uma conta.</a>
                </div>
            </form>

            <?php
                include "../_scripts/account_writer.php";
            ?>

            <script>//Obtido daqui https://chat.openai.com/share/37a24d2b-382f-4500-a6f0-4126bc06150e
                function validarSenha() {
                    var senha1 = document.getElementById("psswd").value;
                    var senha2 = document.getElementById("psswd2").value;

                    if (senha1 === senha2) {
                        document.getElementById("resultado").innerHTML = "";
                        document.getElementById("send").disabled = false;
                    } else {
                        document.getElementById("resultado").innerHTML = "As senhas não correspondem.";
                        document.getElementById("send").disabled = true;
                    }
                }
                document.getElementById("psswd").addEventListener("input", validarSenha);
                document.getElementById("psswd2").addEventListener("input", validarSenha);
            </script>
        </div>
    </main>

    <?php
        show("../_templates/footer.html");
    ?>
</body>

</html>