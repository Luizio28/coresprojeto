<?php
include "../_scripts/sql_db_connector.php";

function login_attempt()
{
    extract($_POST);

    try {
        $db_connection = connect_to_db();

        switch ($nome){
            case 7:
                $result = $db_connection->query("SELECT * FROM administradores");

                while ($row = $result->fetch_assoc()) {
                    if ($nome == $row['nome'] & $psswd == $row['psswd']) {
                        $is_in_db = true;
                    }
                }

                if (!$is_in_db){
                    echo "
                    <div class='flex-column'>
                        <h1>ERRO</h1>
                        
                        <div class='box'>
                            <p>Dados de login incorretos ou inválidos</p>
                        </div>
                    </div>
                    ";
                }

                header(($is_in_db) ? "Location: ../docentes/" : "Location: ../home/"); 
            case 12:
                $result = $db_connection->query("SELECT * FROM discente");

                while ($row = $result->fetch_assoc()) {
                    if ($nome == $row['nome'] & $psswd == $row['psswd']) {
                        $is_in_db = true;
                    }
                }

                if (!$is_in_db){
                    echo "
                    <div class='flex-column'>
                        <h1>ERRO</h1>
                        
                        <div class='box'>
                            <p>Dados de login incorretos ou inválidos</p>
                        </div>
                    </div>
                    ";
                }

                header(($is_in_db) ? "Location: ../discentes/" : "Location: ../home/"); 
        }
        
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
