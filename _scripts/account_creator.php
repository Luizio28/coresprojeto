<?php
include "../_scripts/sql_db_connector.php";

extract($_POST);

if (isset($send)) {
    try {
        $pdo = connect_with_pdo();

        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        $hashed_psswd = password_hash($psswd, PASSWORD_DEFAULT);

        $stmt = $pdo->prepare("INSERT INTO usuario (id, nome, email, fone, curso, turma, superuser, psswd)
        VALUES (:id, :nome, :email, :fone, :curso, :turma, :superuser, :psswd)");

        $params = array(
            ':id' => array('value' => $id, 'type' => PDO::PARAM_INT),
            ':nome' => array('value' => $nome, 'type' => PDO::PARAM_STR_CHAR),
            ':email' => array('value' => $email, 'type' => PDO::PARAM_STR_CHAR),
            ':fone' => array('value' => $fone, 'type' => PDO::PARAM_INT),
            ':curso' => array('value' => $curso, 'type' => PDO::PARAM_INT),
            ':turma' => array('value' => $turma, 'type' => PDO::PARAM_INT),
            ':superuser' => array('value' => null, 'type' => PDO::PARAM_BOOL),
            ':psswd' => array('value' => $psswd, 'type' => PDO::PARAM_STR_CHAR),
        );

        foreach ($params as $param => $data) {
            $stmt->bindParam($param, $data['value'], $data['type']);
        }

        $stmt->execute();
    } catch (PDOException $e) {
        handle_pdo_exception($e);
    }
}
