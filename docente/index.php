<html lang="pt-BR">

<head>
    <?php
    include("../_templates/echoer.php");

    include("../_scripts/requests_reader.php");

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
            <h1>Requerimentos</h1>

            <div class="flex-grid">
                <?php echo_requests(); ?>
            </div>
        </div>
    </main>

    <?php
    show("../_templates/footer.html");
    ?>
</body>

</html>