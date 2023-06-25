<?php
if (isset($_POST['send'])) {
    include "../_scripts/sql_db_connector.php";

    try {
        $pdo = connect_with_pdo();

        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        $hashed_psswd = password_hash($_POST['psswd'], PASSWORD_DEFAULT);

        $stmt = $pdo->prepare("INSERT INTO usuario (id, nome, email, fone, curso, turma, superuser, psswd)
            VALUES (:id, :nome, :email, :fone, :curso, :turma, :superuser, :psswd)");

        $is_super = strlen($_POST['id']) == 7;

        $stmt->bindParam(':id', $_POST['id']);
        $stmt->bindParam(':nome', $_POST['nome']);
        $stmt->bindParam(':email', $_POST['email']);
        $stmt->bindParam(':fone', $_POST['fone']);
        $stmt->bindParam(':curso', $_POST['curso']);
        $stmt->bindParam(':turma', $_POST['turma']);
        $stmt->bindParam(':superuser', $is_super);
        $stmt->bindParam(':psswd', $hashed_psswd);

        $stmt->execute();

        setcookie('id', $row['id'], time() + 3600, "/");

        $loc = strlen($_POST['id']) == 12 ? "usuario" : "administrador";
        header("Location: ../$loc/");
    } catch (PDOException $e) {
        handle_pdo_exception($e);
    }
}
