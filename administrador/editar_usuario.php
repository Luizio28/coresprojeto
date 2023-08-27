<!DOCTYPE html>
<html>
<head>
    <title>Editar Usuário</title>
</head>
<body>
    <h1>Editar Usuário</h1>
    <?php
    require_once 'usuarios.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $usuario = getUsuarioById($id);

        if ($usuario) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $novoNome = $_POST['nome'];
                editarUsuario($id, $novoNome);
                header('Location: index.php');
            }
    ?>
            <form method="post">
                <label for="nome">Novo Nome:</label>
                <input type="text" name="nome" value="<?php echo $usuario['nome']; ?>" required>
                <button type="submit">Salvar</button>
            </form>
    <?php
        } else {
            echo '<p>Usuário não encontrado.</p>';
        }
    } else {
        echo '<p>ID do usuário não fornecido.</p>';
    }
    ?>
</body>
</html>
