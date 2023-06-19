<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <?php
    include("../_templates/echoer.php");

    include("requests_reader.php");
    include("resquests_writer.php");

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
            <div class="flex-row">
                <div class="box standard-width">
                    <p>Para adicionar um novo contato, clique no simbolo de soma</p>
                </div>
                <div>
                    <button onclick="toggle(document.getElementById('create-new'))" id="add">+</button>
                </div>
            </div>

            <h1>Contatos</h1>

            <div class="flex-grid">
                <?php echo_contacts(); ?>
            </div>

            <form id="create-new" class="center-abs flex-column hidden box" method="post">
                <h1>Novo contato</h1>

                <div class="flex-row spaced-between">
                    <label for="nome">Nome</label>
                    <input maxlength="16" type="text" name="name" required>
                </div>
                <div class="flex-row spaced-between">
                    <label for="email">Email</label>
                    <input maxlength="64" type="email" name="email" required>
                </div>
                <div class="flex-row spaced-between">
                    <label for="zap"> N° telefone (whatsapp)</label>
                    <input maxlength="11" type="tel" name="tel" required>
                </div>

                <div>
                    <input type="submit" name="send" value="criar">
                    <input type="reset" value="apagar">
                </div>
            </form>
        </div>
    </main>

    <?php
    show("../_templates/footer.html");
    ?>
</body>

</html>