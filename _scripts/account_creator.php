<?php
if (isset($_POST['send'])) {
    include "../_scripts/sql_db_connector.php";

    try {
        $pdo = connect_with_pdo();

        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        $hashed_psswd = password_hash($_POST['psswd'], PASSWORD_DEFAULT);

        $stmt = $pdo->prepare("INSERT INTO usuario (id, nome, email, fone, curso, turma, superuser, psswd)
            VALUES (:id, :nome, :email, :fone, :curso, :turma, :superuser, :psswd)");

        $params = array(
            ':id' => $_POST['id'],
            ':nome' => $_POST['nome'],
            ':email' => $_POST['email'],
            ':fone' => $_POST['fone'],
            ':curso' => $_POST['curso'],
            ':turma' => $_POST['turma'],
            ':superuser' => strlen($_POST['id']) == 7,
            ':psswd' => $hashed_psswd,
        );

        foreach ($params as $param => $data) {
            $stmt->bindParam($param, $data);
        }

        $stmt->execute();

        setcookie('id', $row['id'], time() + 3600, "/");

        $loc = strlen($_POST['id']) == 12 ? "usuario" : "administrador";
        header("Location: ../$loc/");
    } catch (PDOException $e) {
        handle_pdo_exception($e);
    }
}
