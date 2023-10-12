<?php
if (isset($_POST['send'])) {
    require_once "../_scripts/sql_db_connector.php";        

    $pdo = connect_with_pdo();

    $statement = $pdo->prepare("DELETE FROM requerimento WHERE id = :id");
    $statement->bindParam(':id', $_POST['id']);

    $statement->execute();

    header("Location: ../lista-requerimento-admin");
    exit;
}else{
    echo "<input name='id' type='hidden' value='".$_POST['id']."'>";
}