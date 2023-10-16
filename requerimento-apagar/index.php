<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php
    include "../_templates/echoer.php";
    include "../_templates/head.php";

    head_constructor("Alterar situacao", true);
    ?>

    <meta name="description" content="Essa é a página que os admins apagam os requerimentos para a CORES do IFBA Campus Eunápolis">
</head>


<body>
    <?php
    include "../_templates/header.php";
    ?>

<main>
        <div class="flex-column">
            <h1>Tem certeza?</h1>

            <form enctype="multipart/form-data" id="create-new" class="center-flex flex-column box" method="post">

            <?php include "../_scripts/requests_remover.php";?>

                <div>
                    <input type="submit" name="send" id="send" value="sim">
					<a href="../requerimento-lista-admin">não</a>
                </div>
            </form>
        </div>
    </main>

    <?php
    show("../_templates/footer.html");
    ?>
</body>

</html>