<?php
function login_attempt()
{
    extract($_POST);

    try {
        $db_hostname = 'localhost';
        $db_user = 'root';
        $db_pass = '';
        $db_name = 'requerimentos';

        $conn = new mysqli($db_hostname, $db_user, $db_pass, $db_name);

        $result = $conn->query("SELECT * FROM discente");

        if (!$result) {
            echo "Error: " . $conn->error;
        } else {
            while ($row = $result->fetch_assoc()) {
                if ($nome == $row['nome']){
                    header("Location: ../discentes/");//To do, fazer o mesmo com os docentes
                }
            }
        }

        $conn->close();
    } catch (Throwable $th) {
        $conn = NULL;
        echo ("
            <div class='box flex-column'>
                <p>
                    erro nos dados de login
                </p>
            </div>
        ");
    }
}

