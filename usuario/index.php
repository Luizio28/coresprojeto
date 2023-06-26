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
    include "../_templates/header.php";
    ?>

    <main>
        <div class="flex-column">
            <h1>Novo requerimento</h1>

            <form id="create-new" class="center-flex flex-column" method="post">
                <div class="spaced-between box">
                    <b>
                        Objeto do requerimento
                    </b>

                    <label for="objeto">
                        O tipo de requerimento que está sendo feito
                    </label>

                    <select name="objeto" id="objeto">
                        <option value="0">Justificativa de falta</option>
                        <option value="1">Segunda chamada</option>
                    </select>
                </div>

                <div class="spaced-between box">
                    <b>
                        Data inicial
                    </b>

                    <label for="inicio">
                        Data em que faltas a serem justificadas começam
                    </label>

                    <input type="date" name="inicio" id="inicio" required>
                </div>

                <div class="spaced-between box">
                    <b>
                        Data final
                    </b>

                    <label for="termino">
                        O último dia em que houve faltas
                    </label>

                    <input type="date" name="termino" id="termino" required>
                </div>

                <div class="spaced-between box">
                    <b>
                        Anexo
                    </b>

                    <label for="anexo" class="inline">
                        &emsp; Anexo único de arquivo pdf contendo todos os documentos necessários para o requerimento, por exemplo, um atestado médico para justificar faltas. Ps: Os documentos fotografados ainda devem ser levados para a CORES por motivos legais.
                    </label>

                    <div class="flex-row">
                        <a class="inline" href="https://www.ilovepdf.com/jpg_to_pdf">site para criar pdf</a>

                        <input type="file" name="anexo" id="anexo" accept=".pdf" required>
                    </div>
                </div>

                <div class="spaced-between box">
                    <b>
                        Observações
                    </b>

                    <label for="obs">
                        Infomações extras sobre o motivo da falta, caso seja necessário.
                    </label>
                    <textarea name="obs" id="obs" cols="50" rows="10" maxlength="255" value="Nda" required></textarea>
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