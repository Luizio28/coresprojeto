<?php
include "../_scripts/sql_db_connector.php";

extract($_POST);

if (isset($send)) {
    try {
        $db_connection = connect_to_db();

        $hashed_psswd = password_hash($psswd, PASSWORD_DEFAULT);
        $hashed_matricula = password_hash($matricula, PASSWORD_DEFAULT);

        $db_consult = "INSERT INTO discente VALUES ('$hashed_matricula','$nome','$email','$fone','$curso','$turma','$hashed_psswd')";


        $sql_query = mysqli_query($db_connection, $db_consult);
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