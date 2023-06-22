<?php
include "../_scripts/sql_db_connector.php";

extract($_POST);

//this still fells like it could be DRYer

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

    switch ($nome) {
        case 7:
            $stmt = $pdo->prepare("SELECT siape, psswd FROM administradores");
            $stmt->execute();

            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($res as $row) {
                if ($nome == $row['siape'] & $psswd == $row['psswd']) {
                    setcookie("siape", $row['siape'], time() + 3600);
                    header("Location: ../docentes/");
                }
            }

        case 12:
            $stmt = $pdo->prepare("SELECT matricula, psswd FROM discentes");
            $stmt->execute();

            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($res as $row) {
                if ($nome == $row['matricula'] & $psswd == $row['psswd']) {
                    setcookie("matricula", $row['matricula'], time() + 3600);

                    header("Location: ../discentes/");
                }
            }
    }
}
