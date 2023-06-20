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

        $result = $db_connection->query("SELECT * FROM discente");

        while ($row = $result->fetch_assoc()) {
            if ($nome == $row['nome']) {
                header("Location: ../discentes/"); //To do, fazer o mesmo com os docentes
            }
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
    }
}