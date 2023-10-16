<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php
    include "../_templates/echoer.php";
    include "../_templates/head.php";

    head_constructor("sign-in");
    ?>

    <meta name="description" content="Seja bem-vindo de volta! Essa é a página de login do site de requerimentos da CORES do IFBA Campus Eunápolis">
</head>


<body>
    <?php
    include "../_templates/header.php";
    ?>

    <main>
        <div class="flex-column">
            <h1>Login</h1>

            <form method="post" class="box flex-column">
                <div class="flex-row spaced-between">
                    <label for="id">
                        Matrícula
                    </label>
                    <input maxlength="12" type="text" name="id" id="id" required>
                </div>

                <div class="flex-row spaced-between">
                    <label for="psswd">
                        Senha
                    </label>
                    <input maxlength="255" type="password" name="psswd" id="psswd" required>
                </div>

                <div class="flex-row spaced-between">
                    <input type="submit" name="send" value="Entrar">
                    <a href="../sign-up/">Não tem conta?</a>
                </div>
            </form>

            <?php
            include "../_scripts/account_checker.php";
            ?>
        </div>
    </main>

    <?php
    show("../_templates/footer.html");
    ?>
</body>

</html>