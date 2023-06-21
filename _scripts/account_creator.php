<?php
include "../_scripts/sql_db_connector.php";

extract($_POST);

if (isset($send)) {
    try {
        $db_connection = connect_to_db();

        $pdo = connect_with_pdo();

        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        $hashed_psswd = hash('sha256', $psswd, true);

        if (strlen($nome == 12)) {
            $stmt = $pdo->prepare("INSERT INTO discente (matricula, nome, email, fone, curso, turma, psswd)
                               VALUES (:matricula, :nome, :email, :fone, :curso, :turma, :psswd");

            $stmt->bindParam(':matricula', $matricula);
            $stmt->bindParam(':fone', $fone);
            $stmt->bindParam(':turma', $turma);
        } else {
            $stmt = $pdo->prepare("INSERT INTO administradores (siape, nome, email, curso, psswd)
                               VALUES (:siape, :nome, :email, :curso, :psswd");

            $stmt->bindParam(':siape', $siape);
        }

        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':curso', $curso);
        $stmt->bindParam(':psswd', $hashed_psswd);

        $stmt->execute();
    } catch (Throwable $th) {
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
