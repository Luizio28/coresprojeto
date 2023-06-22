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

    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    $hashed_psswd = hash('sha256', $psswd, true);

    $stmt = $pdo->prepare("INSERT INTO usuario (id, nome, email, fone, curso, turma, superuser, psswd)
                               VALUES (:id, :nome, :email, :fone, :curso, :turma, :superuser, :psswd");

    $stmt->bindParam(':id', $id, PDO::PARAM_INT, 12);
    
    $stmt->bindParam(':nome', $nome, PDO::PARAM_STR_CHAR, 255);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR_CHAR, 255);
    $stmt->bindParam(':fone', $fone, PDO::PARAM_INT, 11);
    $stmt->bindParam(':curso', $curso, PDO::PARAM_INT, 1);
    $stmt->bindParam(':turma', $turma, PDO::PARAM_INT, 1);
    $stmt->bindParam(':psswd', $hashed_psswd, PDO::PARAM_LOB, 32);

    $stmt->execute();
}
