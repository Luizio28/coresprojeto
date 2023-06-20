<!DOCTYPE html>
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
    <?php
    show("../_templates/header.html");
    ?>

    <main>
        <div class="flex-column">
            <form id="create-new" class="center-flex flex-column box" method="post">
                <h1>Novo requerimento</h1>

                <div class="flex-row spaced-between">
                    <label for="curso">
                        Objeto do requerimento
                    </label>

                    <select name="objeto">
                        <option value="1">Justificativa de falta</option>
                        <option value="2">Segunda chamada</option>
                    </select>
                </div>

                <div class="flex-row spaced-between">
                    <label for="inicio">Data inicial</label>
                    <input type="date" name="inicio" required>
                </div>

                <div class="flex-row spaced-between">
                    <label for="inicio">Data final</label>
                    <input type="date" name="termino" required>
                </div>

                <div class="flex-row spaced-between">
                    <label for="anexo">Anexo</label>
                    <input type="file" name="anexo" required>
                </div>

                <div class="flex-row spaced-between">
                    <label for="curso">
                        Objeto do requerimento
                    </label>

                    <select name="objeto">
                        <option value="1">Protocolado</option>
                        <option value="2">Deferido</option>
                        <option value="3">Indeferido</option>
                        <option value="4">Concluído</option>
                    </select>
                </div>

                <div>
                    <input type="submit" name="send" value="criar">
                </div>
            </form>
        </div>
    </main>

    <?php
    show("../_templates/footer.html");
    ?>
</body>

</html>