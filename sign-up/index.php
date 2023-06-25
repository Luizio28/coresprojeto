<!DOCTYPE html>
<html lang="pt-BR">

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
            <form id="create-new" class="center-flex flex-column box" method="post">

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
                    <label for="curso">
                        Curso
                    </label>

                    <select name="curso" id="curso">
                        <option value="1">ED</option>
                        <option value="2">EI</option>
                        <option value="3">EMA</option>
                    </select>
                </div>

                <div class="flex-row spaced-between">
                    <label for="turma">
                        Turma
                    </label>

                    <select name="turma" id="turma">
                        <option value="1">1°</option>
                        <option value="2">2°</option>
                        <option value="3">3°</option>
                        <option value="4">4°</option>
                    </select>
                </div>

                <div class="flex-row spaced-between">
                    <label for="psswd">Senha</label>
                    <input maxlength="255" type="password" name="psswd" id="psswd" required>
                </div>


                <div>
                    <input type="submit" name="send" id="send" value="criar">
                    <a href="../sign-in/">Já tenho uma conta.</a>
                </div>
            </form>

            <?php
            include "../_scripts/account_creator.php";
            ?>
        </div>
    </main>

    <?php
    show("../_templates/footer.html");
    ?>
</body>

</html>