<?php
include "../_scripts/sql_db_connector.php";

extract($_POST);

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


    $stmt = $pdo->prepare("SELECT id, psswd FROM usuario");
    $stmt->execute();

    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($res as $row) {
        if ($nome == $row['id'] & $psswd == $row['psswd']) {
            setcookie("id", $row['id'], time() + 3600);
            header("Location: ../" . strlen($nome) > 7 ? "usuario" : "administrador" . "/");
        }
    }
}
