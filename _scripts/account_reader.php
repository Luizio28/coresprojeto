<?php
function login_attempt()
{
    extract($_POST);

    try {
        $server_ip = $_SERVER['SERVER_ADDR'];
        $is_local = ($server_ip === '127.0.0.1' || $server_ip === '::1');

        if ($is_local) {
            $db_hostname = 'localhost';
            $db_user = 'root';
            $db_pass = '';
            $db_name = 'requerimentos';

        } else { //nn vou vazar dado de server nem a pau
            $db_hostname = 'remote_server_ip';
            $db_user = 'remote_username';
            $db_pass = 'remote_password';
            $db_name = 'remote_database';
        }

        $db_connection = new mysqli($db_hostname, $db_user, $db_pass, $db_name);

        switch ($nome){
            case 7:
                $result = $db_connection->query("SELECT * FROM administradores");

                while ($row = $result->fetch_assoc()) {
                    if ($nome == $row['nome'] & $psswd == $row['psswd']) {
                        $is_in_db = true;
                    }
                }

                header(($is_in_db) ? "Location: ../docentes/" : "Location: ../home/"); 
            case 12:
                $result = $db_connection->query("SELECT * FROM discente");

                while ($row = $result->fetch_assoc()) {
                    if ($nome == $row['nome'] & $psswd == $row['psswd']) {
                        $is_in_db = true;
                    }
                }

                header(($is_in_db) ? "Location: ../discentes/" : "Location: ../home/"); 
        }
        
        $db_connection->close();
        
    } catch (Throwable $th) {
        echo "
        <div class='flex-column'>
            <h1>ERRO</h1>
            
            <div class='box'>
                <p>Dados de login incorretos ou inválidos</p>
            </div>
        </div>
        ";
        header("Location: ../home/");
    }
}
