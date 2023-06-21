<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <?php
    include "../_templates/echoer.php";
    include "../_templates/head.php";

    head_constructor("Novo requerimento");
    ?>

    <script src="../_js/toggle.js"></script>
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
                    <p>
                        O tipo de requerimento que está sendo feito
                    </p>

                    <select name="objeto">
                        <option value="1">Justificativa de falta</option>
                        <option value="2">Segunda chamada</option>
                    </select>
                </div>

                <h1>
                    Data inicial
                </h1>

                <div class="spaced-between box">
                    <p>
                        Data em que faltas a serem justificadas começam
                    </p>

                    <input type="date" name="inicio" required>
                </div>

                <h1>Data final</h1>

                <div class="spaced-between box">
                    <p>
                        O último dia em que houve faltas
                    </p>

                    <input type="date" name="termino" required>
                </div>

                <h1>Anexo</h1>

                <div class="spaced-between box">
                    <p class="flex-row">
                        &emsp; Anexo único de arquivo pdf contendo todos os documentos necessários para o requerimento, por exemplo, um atestado médico para justificar faltas. Ps: Os documentos fotografados ainda devem ser levados para a CORES por motivos legais. <span><a href="https://www.ilovepdf.com/jpg_to_pdf"> Onde posso converter fotos para pdf?</a></span>
                    </p>

                    <input type="file" name="anexo" accept=".pdf" required>
                </div>

                <h1>Observações</h1>

                <div class="spaced-between box">
                    <p>Infomações extras sobre o motivo da falta, caso seja necessário.</p>

                    <textarea name="obs" cols="25" rows="10" maxlength="255" required></textarea>
                </div>

                <div>
                    <input type="submit" name="send" value="criar">
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