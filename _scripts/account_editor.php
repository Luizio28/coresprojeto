<?php
if (isset($_POST['send'])) {
    require_once "../_scripts/sql_db_connector.php";        

    $pdo = connect_with_pdo();
    
    $statement = $pdo->prepare("UPDATE usuario SET superuser = :superuser WHERE id = :id");

    $statement->bindParam(':superuser', $_POST['superuser']);
    $statement->bindParam(':id', $_POST['id']);

    $statement->execute();
    
    header('Location: ../lista-usuario');
    exit;
}else{
    echo "<input name='id' type='hidden' value='".$_GET['id']."'>";
}