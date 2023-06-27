<?php

//high DRYification potential

if (isset($_POST['send'])) {
    include "../_scripts/sql_db_connector.php";

    try {
        $pdo = connect_with_pdo();

        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        $statement = $pdo->prepare("INSERT INTO requerimento (objeto, inicio, termino, anexo, obs, usuario_id)
            VALUES (:objeto, :inicio, :termino, :anexo, :obs, :usuario_id)");

        $statement->bindParam(':objeto', $_POST['objeto']);
        $statement->bindParam(':inicio', $_POST['inicio']);
        $statement->bindParam(':termino', $_POST['termino']);
        $statement->bindParam(':anexo', $_POST['anexo']);
        $statement->bindParam(':obs', $_POST['obs']);
        $statement->bindParam(':usuario_id', $_SESSION['id']);

        $statement->execute();
    } catch (PDOException $exception) {
        handle_pdo_exception($exception);
    }
}
