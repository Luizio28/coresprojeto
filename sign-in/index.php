<html lang="pt-BR">

<head>
    <?php
    include "../_templates/echoer.php";
    include "../_templates/head.php";

    head_constructor("sign-in");
    ?>

    <script src="../_js/toggle.js"></script>
</head>


<body>
    <?php
    show("../_templates/header.html");
    ?>

    <main>
        <div class="flex-column">
            <h1>Login</h1>

            <form method="post" action="../_scripts/account_reader.php" class="box">
                <div class="flex-row spaced-between">
                    <label for="id">
                        N° de matrícula
                    </label>

                    <input maxlength="12" type="text" name="id" required>
                </div>

                <div class="flex-row spaced-between">
                    <label for="psswd">
                        Senha
                    </label>

                    <input maxlength="255" type="password" name="psswd" required>
                </div>

                <div class="flex-row spaced-between">
                    <input type="submit" name="send" value="Entrar">
                    <a href="../sign-up/">Não tem conta?</a>
                </div>
            </form>
        </div>
    </main>

    <?php
    show("../_templates/footer.html");
    ?>
</body>

</html>

<!-- 
<form class="box" id="login">
    <div class="flex-row spaced-between">
        <label for="id">
            N° de matrícula
        </label>

        <input maxlength="12" type="text" name="id" required>
    </div>

    <div class="flex-row spaced-between">
        <label for="psswd">
            Senha
        </label>

        <input maxlength="255" type="password" name="psswd" required>
    </div>

    <div class="flex-row spaced-between">
        <input type="submit" name="send" value="Entrar">
        <a href="../sign-up/">Não tem conta?</a>
    </div>
</form>

<script>
    login.addEventListener("submit", function(e) {
        e.preventDefault();


        
        fetch(

        )
    })
</script>
-->