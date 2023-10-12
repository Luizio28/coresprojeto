<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php
    include "../_templates/echoer.php";
    include "../_templates/head.php";

    head_constructor("Lista de requerimentos");
    ?>

    <script src="../_js/table_sort.js"></script>

    <meta name="description"
        content="Essa é a página que os usuários revisam os requerimentos enviados para a CORES do IFBA Campus Eunápolis">
</head>


<body>
    <?php
    include "../_templates/header.php";
    ?>

    <main>
        <div class="flex-column">
            <h1>Meus Requerimentos</h1>

            <?php include "../_scripts/requests_reader_own.php"; ?>

            <a href="../usuario">voltar</a>
        </div>
    </main>

    <?php
    show("../_templates/footer.html");
    ?>
</body>

</html>