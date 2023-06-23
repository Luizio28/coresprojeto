<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <?php
    include "../_templates/echoer.php";
    include "../_templates/head.php";

    head_constructor("Novo requerimento");
    ?>

    <meta name="description" id="description" content="Essa é a página em que requerimentos são escritos e enviados pelos usuários para CORES do IFBA Campus Eunápolis">
</head>


<body>
    <?php
    show("../_templates/header.html");
    ?>

    <main>
        <div class="flex-column">
            <h1>Novo requerimento</h1>

            <form id="create-new" class="center-flex flex-column" method="post">
                <h1>
                    Objeto do requerimento
                </h1>

                <div class="spaced-between box">
                    <label for="objeto">
                        O tipo de requerimento que está sendo feito
                    </label>

                    <select name="objeto" id="objeto">
                        <option value="1">Justificativa de falta</option>
                        <option value="2">Segunda chamada</option>
                    </select>
                </div>

                <h1>
                    Data inicial
                </h1>

                <div class="spaced-between box">
                    <label for="inicio">
                        Data em que faltas a serem justificadas começam
                    </label>

                    <input type="date" name="inicio" id="inicio" required>
                </div>

                <h1>Data final</h1>

                <div class="spaced-between box">
                    <label for="termino">
                        O último dia em que houve faltas
                    </label>

                    <input type="date" name="termino" id="termino" required>
                </div>

                <h1>Anexo</h1>

                <div class="spaced-between box">
                    <label for="anexo" class="inline">
                        &emsp; Anexo único de <a class="inline" href="https://www.ilovepdf.com/jpg_to_pdf"> arquivo pdf </a> contendo todos os documentos necessários para o requerimento, por exemplo, um atestado médico para justificar faltas. Ps: Os documentos fanexootografados ainda devem ser levados para a CORES por motivos legais.
                    </label>

                    <input type="file" name="anexo" id="anexo" accept=".pdf" required>
                </div>

                <h1>Observações</h1>

                <div class="spaced-between box">
                    <label for="obs">
                        Infomações extras sobre o motivo da falta, caso seja necessário.
                    </label>
                    <textarea name="obs" id="obs" cols="25" rows="10" maxlength="255" required></textarea>
                </div>

                <div>
                    <input type="submit" name="send" id="send" value="criar">
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