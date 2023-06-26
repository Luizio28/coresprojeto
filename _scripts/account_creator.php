<?php
if (isset($_POST['send'])) {
    include "../_scripts/sql_db_connector.php";

    try {
        $pdo = connect_with_pdo();

        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        $hashed_password = password_hash($_POST['psswd'], PASSWORD_DEFAULT);

        $statement = $pdo->prepare("INSERT INTO usuario (id, nome, email, fone, curso, turma, superuser, psswd)
            VALUES (:id, :nome, :email, :fone, :curso, :turma, :superuser, :psswd)");

        $is_superuser = strlen($_POST['id']) == 7;

        $statement->bindParam(':id', $_POST['id']);
        $statement->bindParam(':nome', $_POST['nome']);
        $statement->bindParam(':email', $_POST['email']);
        $statement->bindParam(':fone', $_POST['fone']);
        $statement->bindParam(':curso', $_POST['curso']);
        $statement->bindParam(':turma', $_POST['turma']);
        $statement->bindParam(':superuser', $is_superuser);
        $statement->bindParam(':psswd', $hashed_password);

        $statement->execute();

        setcookie('id', $_POST['id'], time() + 3600, "/");

        $directory = $superuser == 1? "administrador" : "usuario";

        header("Location: ../$directory/");

    } catch (PDOException $exception) {
        handle_pdo_exception($exception);
    }
}
