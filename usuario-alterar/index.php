<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php
    include "../_templates/echoer.php";
    include "../_templates/head.php";

    head_constructor("Alterar usuario", true);
    ?>

    <meta name="description" content="Essa é a página que os admins alteram o nivel de permissào dos usuarios para a CORES do IFBA Campus Eunápolis">
</head>


<body>
    <?php
    include "../_templates/header.php";
    ?>

<main>
        <div class="flex-column">
            <h1>Alterar permissào</h1>

            <form enctype="multipart/form-data" id="create-new" class="center-flex flex-column box" method="post">

            <?php include "../_scripts/account_editor.php" ?>

                <div class="spaced-between flex-row">
                    <label for="superuser" title="O nível de permissão do usuario">
                        Nível
                    </label>
                    
                    <select name="superuser" id="superuser">
                        <option value="0">Usuario</option>
                        <option value="1">Admin</option>
                    </select>
                </div>


                <div>
                    <input type="submit" name="send" id="send" value="salvar">
					<a href="../lista-usuario">voltar</a>
                </div>
            </form>
        </div>
    </main>

    <?php
    show("../_templates/footer.html");
    ?>
</body>

</html>