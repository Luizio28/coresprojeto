<?php

//high DRYification potential

if (isset($_POST['send'])) {
    include "../_scripts/sql_db_connector.php";

    try {
        $pdo = connect_with_pdo();

        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        $stmt = $pdo->prepare("INSERT INTO requerimento (id, objeto, inicio, termino, registro, anexo, obs, situacao, usuario_id)
                               VALUES (:id, :objeto, :inicio, :termino, :registro, :anexo, :obs, :situacao, :usuario_id)");

        $id = null;
        $registro = null;

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        $stmt->bindParam(':objeto', $_POST['objeto'], PDO::PARAM_INT, 1);
        $stmt->bindParam(':inicio', $_POST['inicio']);
        $stmt->bindParam(':termino', $_POST['termino']);
        $stmt->bindParam(':registro', $registro);

        $stmt->bindParam(':anexo', $_POST['anexo'], PDO::PARAM_LOB);
        $stmt->bindParam(':obs', $_POST['obs'], PDO::PARAM_STR_CHAR, 255);
        $stmt->bindParam(':situacao', $_POST['situacao'], PDO::PARAM_INT, 1);

        $stmt->bindParam(':usuario_id', $_POST['usuario_id'], PDO::PARAM_INT, 12);

        $stmt->execute();
    } catch (PDOException $e) {
        handle_pdo_exception($e);
    }
}
