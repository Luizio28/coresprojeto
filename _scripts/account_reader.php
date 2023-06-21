<?php
include "../_scripts/sql_db_connector.php";
// Alto potencial para ser mais DRY
function login_attempt()
{
    extract($_POST);

    try {
        $db_connection = connect_to_db();

        $out_domain = "Location: ../home/";

        switch ($nome) {
            case 7:
                $result = $db_connection->query("SELECT * FROM administradores");

                $out_domain = "Location: ../docentes/";
            case 12:
                $result = $db_connection->query("SELECT * FROM discente");

                $out_domain = "Location: ../discentes/";
        }

        while ($row = $result->fetch_assoc()) {
            if ($nome == $row['nome'] & $psswd == $row['psswd']) {
                $is_in_db = true;
            }
        }

        if (!$is_in_db) {
            echo "
            <div class='flex-column'>
                <h1>ERRO</h1>
                
                <div class='box'>
                    <p>Dados de login incorretos ou inválidos</p>
                </div>
            </div>
            ";
        }

        header(($is_in_db) ? $out_domain : "Location: ../home/");

        $db_connection->close();
    } catch (Throwable $th) {
        echo "
        <div class='flex-column'>
            <h1>ERRO</h1>
            
            <div class='box'>
                <p>não foi possível conectar ao servidor</p>
            </div>
        </div>
        ";
        header("Location: ../home/");
    }
}
