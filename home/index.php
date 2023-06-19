<html lang="pt-BR">

<head>
    <?php
    include("../_templates/echoer.php");

    include("../_scripts/requests_reader.php");
    include("../_scripts/resquests_writer.php");

    include("../_templates/head.php");
    head_constructor("Contatos");
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

            <form method="post" action="TODO ADD ACTION" class="box">
                <div class="flex-row spaced-between">
                    <label for="matricula">
                        N° de matrícula
                    </label>

                    <input type="text" name="matricula">
                </div>

                <div class="flex-row spaced-between">
                    <label for="psswd">
                        Senha
                    </label>

                    <input type="password" name="psswd">
                </div>

                <div class="flex-row spaced-between">
                    <input type="submit" name="send" value="Entrar">
                    <a href="../newbie/">Não tem conta?</a>
                </div>
            </form>
        </div>
    </main>

    <?php
    show("../_templates/footer.html");
    ?>
</body>

</html>