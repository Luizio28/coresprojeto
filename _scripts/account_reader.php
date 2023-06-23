<?php
if (isset($_POST['send'])) {
    include "../_scripts/sql_db_connector.php";

    try {
        $pdo = connect_with_pdo();

        $stmt = $pdo->prepare("SELECT id,psswd FROM usuario");
        $stmt->execute();

        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $sucess = false;
        foreach ($res as $row) {
            $sucess = $_POST['id'] == $row['id'] & password_verify($_POST['psswd'], $row['psswd']) ? true : $sucess;
        }

        if (!$sucess) {
            header("Location: ../sign-in");
        } else {
            setcookie("id", $row['id'], time() + 3600);

            $loc = strlen($_POST['id']) == 12 ? "usuario" : "administrador";
            header("Location: ../$loc/");
        }
    } catch (PDOException $e) {
        handle_pdo_exception($e);
    }
}
