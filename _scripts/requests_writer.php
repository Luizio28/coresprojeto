<?php

//high DRYification potential

if (isset($_POST['send'])) {
    include "../_scripts/sql_db_connector.php";

    try {
        $pdo = connect_with_pdo();

        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        $stmt = $pdo->prepare("INSERT INTO requerimento (objeto, inicio, termino, anexo, obs, usuario_id)
            VALUES (:objeto, :inicio, :termino, :anexo, :obs, :usuario_id)");

        $stmt->bindParam(':objeto', $_POST['objeto']);
        $stmt->bindParam(':inicio', $_POST['inicio']);
        $stmt->bindParam(':termino', $_POST['termino']);
        $stmt->bindParam(':anexo', $_POST['anexo']);
        $stmt->bindParam(':obs', $_POST['obs']);
        $stmt->bindParam(':usuario_id', $_COOKIE['id']);

        $stmt->execute();
    } catch (PDOException $e) {
        handle_pdo_exception($e);
    }
}
