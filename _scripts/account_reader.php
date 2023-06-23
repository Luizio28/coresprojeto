<?php
if (isset($_POST['send'])) {
    include "../_scripts/sql_db_connector.php";

    try {
        $pdo = connect_with_pdo();

        $stmt = $pdo->prepare("SELECT id,psswd FROM usuario");
        $stmt->execute();

        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($res as $row) {
            if ($_POST['$nome'] == $row['id'] & password_verify($_POST['$psswd'], $row['psswd'])) {
                $sucess = true;
                setcookie("id", $row['id'], time() + 3600);
                header("Location: ../" . strlen($_POST['$nome']) > 7 ? "usuario" : "administrador" . "/");
            }
        }
        if (!$sucess) {
            header("Location: ../sign-in");
        }
    } catch (PDOException $e) {
        handle_pdo_exception($e);
    }
}
