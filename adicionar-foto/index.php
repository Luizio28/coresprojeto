<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php
    include "../_templates/echoer.php";
    include "../_templates/head.php";

    head_constructor("Nova foto");
    ?>

    <meta name="description" id="description" content="Essa é a página em que a foto de perfil dos usuários é alterada para CORES do IFBA Campus Eunápolis">
</head>

<body>
    <?php
    include "../_templates/header.php";
    ?>

    <main>
        <div class="flex-column">
            <h1>Nova foto</h1>

            <form enctype="multipart/form-data" id="create-new" class="center-flex flex-column box" method="post">
                <!-- ... outras partes do formulário ... -->

                <div class="spaced-between flex-column">
                    <label>
                        Foto de Perfil
                    </label>
                    <input type="file" name="foto_perfil" id="foto_perfil" accept="image/*">
                    <span class="tooltip" id="tp1">Adicione uma foto de perfil (imagem) opcional.</span>
                </div>

                <div>
                    <input type="submit" name="send" id="send" value="criar">
                    <input type="reset" value="reset">
                    <a href="../usuario">voltar</a>
                </div>
            </form>

            <?php
            include "../_scripts/requests_writer.php";
            ?>
        </div>
    </main>

    <?php
    show("../_templates/footer.html");
    ?>
</body>

</html>
