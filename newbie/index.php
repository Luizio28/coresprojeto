<html lang="pt-BR">

<head>
    <?php
    include("../_templates/echoer.php");

    include("../_scripts/requests_reader.php");
    include("../_scripts/requests_writer.php");

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
            <h1>Bem-vindo!</h1>
            <form id="create-new" class="center-flex flex-column box" method="post">

                <div class="flex-row spaced-between">
                    <label for="matricula"> N° de matícula</label>
                    <input maxlength="12" type="text" name="matricula" required>
                </div>

                <div class="flex-row spaced-between">
                    <label for="nome">Nome</label>
                    <input maxlength="255" type="text" name="nome" required>
                </div>

                <div class="flex-row spaced-between">
                    <label for="email">Email</label>
                    <input maxlength="255" type="email" name="email" required>
                </div>

                <div class="flex-row spaced-between">
                    <label for="zap"> N° telefone (whatsapp)</label>
                    <input maxlength="11" type="tel" name="fone" required>
                </div>

                <div class="flex-row spaced-between">
                    <label for="curso">
                        Curso
                    </label>

                    <select name="curso">
                        <option value="1">ED</option>
                        <option value="2">EI</option>
                        <option value="3">EMA</option>
                    </select>
                </div>

                <div class="flex-row spaced-between">
                    <label for="turma">
                        Turma
                    </label>

                    <select name="turma`">
                        <option value="1">1°</option>
                        <option value="2">2°</option>
                        <option value="3">3°</option>
                        <option value="4">4°</option>
                    </select>
                </div>

                <div class="flex-row spaced-between">
                    <label for="psswd">Senha</label>
                    <input maxlength="255" type="password" name="psswd" required>
                </div>


                <div>
                    <input type="submit" name="send" value="criar">
                    <a href="../home/">Já tenho uma conta.</a>
                </div>
            </form>
        </div>
    </main>

    <?php
    show("../_templates/footer.html");
    ?>
</body>

</html>