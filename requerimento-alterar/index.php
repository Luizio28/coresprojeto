<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php
    include "../_templates/echoer.php";
    include "../_templates/head.php";

    head_constructor("Alterar situacao", true);
    ?>

    <meta name="description" content="Essa é a página que os admins alteram a situação dos requerimentos para a CORES do IFBA Campus Eunápolis">
</head>


<body>
    <?php
    include "../_templates/header.php";
    ?>

<main>
        <div class="flex-column">
            <h1>Alterar situacao</h1>

            <form enctype="multipart/form-data" id="create-new" class="center-flex flex-column box" method="post">

            <?php include "../_scripts/requests_editor.php" ?>

                <div class="spaced-between flex-row">
                    <label for="situacao" title="O tipo de requerimento que está sendo feito">
                        Situação
                    </label>
                    
                    <select name="situacao" id="situacao">
                        <option value="0">Indeferido</option>
                        <option value="1">Deferido</option>
                        <option value="2">Protocolado</option>
                        <option value="3">Concluído</option>
                    </select>
                </div>


                <div>
                    <input type="submit" name="send" id="send" value="salvar">
					<a href="../requerimento-lista-admin">voltar</a>
                </div>
            </form>
        </div>
    </main>

    <?php
    show("../_templates/footer.html");
    ?>
</body>

</html>