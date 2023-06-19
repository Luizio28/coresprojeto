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

    <main>
        <?php
        show("../_templates/header.html");
        ?>

        <h1>Requerimentos</h1>

        <div class="flex-grid">
            <?php echo_contacts(); ?>
        </div>

    </main>

    <?php
    show("../_templates/footer.html");
    ?>
</body>

</html>