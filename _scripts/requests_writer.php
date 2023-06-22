<?php
include "../_scripts/sql_db_connector.php";

extract($_POST);

//high DRYification potential

if (isset($send)) {
    try {
        $pdo = connect_with_pdo();
    } catch (PDOException $e) {
        echo "
        <div class='flex-column'>
            <h1>ERRO</h1>
            
            <div class='box'>
                <p>" . $e->getMessage() . "</p>
            </div>
        </div>
        ";
    }

    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    $stmt = $pdo->prepare("INSERT INTO requerimento (id, objeto, inicio, termino, registro, anexo, obs, situacao, discente_id)
                               VALUES (:id, :objeto, :inicio, :termino, :registro, :anexo, :obs, :situacao, :discente_id)");

    $id = null;
    $registro = null;

    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    $stmt->bindParam(':objeto', $objeto, PDO::PARAM_INT, 1);
    $stmt->bindParam(':inicio', $inicio);
    $stmt->bindParam(':termino', $termino);
    $stmt->bindParam(':registro', $registro);

    $stmt->bindParam(':anexo', $anexo, PDO::PARAM_LOB);
    $stmt->bindParam(':obs', $obs, PDO::PARAM_STR_CHAR, 255);
    $stmt->bindParam(':situacao', $situacao, PDO::PARAM_INT, 1);

    $stmt->bindParam(':discente_id', $discente_id, PDO::PARAM_INT, 12);

    $stmt->execute();
}
