<html lang="pt-BR">

<head>
    <?php
    include "../_templates/echoer.php";
    include "../_scripts/requests_reader.php";
    include "../_templates/head.php";

    head_constructor("Lista de requerimentos");
    ?>
</head>


<body>
    <?php
    show("../_templates/header.html");
    ?>

    <main>
        <div class="flex-column">
            <h1>Requerimentos</h1>

            <?php echo_requests(); ?>
        </div>
    </main>

    <?php
    show("../_templates/footer.html");
    ?>
</body>

</html>