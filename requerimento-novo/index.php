<!DOCTYPE html>
<html lang="pt-br">

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

            <form enctype="multipart/form-data" id="create-new" class="center-flex flex-column box" method="post">
                <div class="spaced-between flex-row">
                    <label for="objeto" title="O tipo de requerimento que está sendo feito">
                        Motivo
                    </label>

                    <select name="objeto" id="objeto">
                        <option value="0">Justificativa de falta</option>
                        <option value="1">Segunda chamada</option>
                    </select>
                </div>

                <div class="spaced-between flex-row">
                    <label for="inicio" title="Data em que faltas a serem justificadas começam">
                        Data inicial
                    </label>

                    <input type="date" name="inicio" id="inicio" required>
                </div>

                <div class="spaced-between flex-row">
                    <label for="termino" title="O último dia em que houve faltas">
                        Data final
                    </label>

                    <input type="date" name="termino" id="termino" required>
                </div>

                <div class="spaced-between flex-column">
                    <label for="obs" title="Infomações extras sobre o motivo da falta, caso seja necessário.">
                        Observações extras
                    </label>
                    <textarea name="obs" id="obs" cols="30" rows="10" maxlength="255" placeholder="Estava me recuperando de uma cirurgia" required></textarea>
                </div>

                <div class="spaced-between flex-column">
                    <label>
                        Anexo único
                    </label>
					<input type="file" name="anexo" id="anexo" accept=".pdf" required>
					<span class="tooltip "id="tp0">Anexo único de arquivo pdf contendo todos os documentos necessários para o requerimento, por exemplo, um atestado médico para justificar faltas. Ps: Os documentos fotografados ainda devem ser levados para a CORES por motivos legais</span>
                </div>

                <div>
                    <input type="submit" name="send" id="send" value="criar">
                    <input type="reset" value="reset">
					<a href="../usuario">voltar</a>
                </div>
            </form>

            <?php
            include "../_scripts/request_writer.php";
            ?>
        </div>
    </main>

    <?php
    show("../_templates/footer.html");
    ?>
</body>

</html>
