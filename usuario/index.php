<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php
    include "../_templates/echoer.php";
    include "../_templates/head.php";

    head_constructor("Lista de requerimentos");
    ?>

    <meta name="description" content="Painel do Usuário.">
</head>


<body>
    <?php
    include "../_templates/header.php";
    ?>

    <main>
        <div class="flex-column">
            <h1>Painel de controle</h1>
            <div class="flex-row">
                <a href="../lista-requerimento-usuario/" class="no-deco">
                    <div class="box">
                        lista de requerimentos
                    </div>
                </a>
                <a href="../novo-requerimento/" class="no-deco">
                    <div class="box">
                        Novo requerimento
                    </div>
                </a>
            </div>
        </div>
    </main>

    <?php
    show("../_templates/footer.html");
    ?>
</body>

</html>
