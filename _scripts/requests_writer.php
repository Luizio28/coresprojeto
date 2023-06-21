<?php
include "../_scripts/sql_db_connector.php";

extract($_POST);

//high DRYification potential

if (isset($send)) {
    try {
        $pdo = connect_with_pdo();

        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        $stmt = $pdo->prepare("INSERT INTO requerimento (id, discente_id, objeto, inicio, termino, registro, anexo, obs, situacao)
                               VALUES (:id, :discente_id, :objeto, :inicio, :termino, :registro, :anexo, :obs, :situacao)");

        $id = null;
        $registro = null;

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':discente_id', $discente_id);
        $stmt->bindParam(':objeto', $objeto);
        $stmt->bindParam(':inicio', $inicio);
        $stmt->bindParam(':termino', $termino);
        $stmt->bindParam(':registro', $registro);
        $stmt->bindParam(':anexo', $anexo);
        $stmt->bindParam(':obs', $obs);
        $stmt->bindParam(':situacao', $situacao);

        $stmt->execute();
    } catch (PDOException $e) {
        echo "
        <div class='flex-column'>
            <h1>ERRO</h1>
            
            <div class='box'>
                <p>não foi possível conectar ao servidor</p>
            </div>
        </div>
        ";
    }
}
