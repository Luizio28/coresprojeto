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
            ':id' => array('value' => $_POST['id'], 'type' => PDO::PARAM_INT),
            ':nome' => array('value' => $_POST['nome'], 'type' => PDO::PARAM_STR),
            ':email' => array('value' => $_POST['email'], 'type' => PDO::PARAM_STR),
            ':fone' => array('value' => $_POST['fone'], 'type' => PDO::PARAM_INT),
            ':curso' => array('value' => $_POST['curso'], 'type' => PDO::PARAM_INT),
            ':turma' => array('value' => $_POST['turma'], 'type' => PDO::PARAM_INT),
            ':superuser' => array('value' => strlen($_POST['id']) == 7, 'type' => PDO::PARAM_BOOL),
            ':psswd' => array('value' => $hashed_psswd, 'type' => PDO::PARAM_STR),
        );

        foreach ($params as $param => $data) {
            $stmt->bindParam($param, $data['value'], $data['type']);
        }

        $stmt->execute();

        setcookie('id', $row['id'], time() + 3600, "/");

        $loc = strlen($_POST['id']) == 12 ? "usuario" : "administrador";
        header("Location: ../$loc/");
    } catch (PDOException $e) {
        handle_pdo_exception($e);
    }
}
