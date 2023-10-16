<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php
    include "../_templates/echoer.php";
    include "../_templates/head.php";

    head_constructor("Lista de usuarios", true);
    ?>

    <script src="../_js/table_sort.js"></script>

    <meta name="description" content="Essa é a página que os admins manejam os usuarios de nossos serviços">
</head>


<body>
    <?php
    include "../_templates/header.php";
    ?>

    <main>
        <div class="flex-column">
            <h1>Usuarios</h1>

            <?php include "../_scripts/account_reader.php"; ?>

            <a href="../administrador">voltar</a>
        </div>
    </main>

    <?php
    show("../_templates/footer.html");
    ?>
</body>

</html>