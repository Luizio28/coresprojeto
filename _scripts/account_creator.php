<?php
extract($_POST);

include "../_scripts/sql_db_connector.php";

if (isset($send)) {
    try {
        $db_connection = connect_to_db();

        $db_consult = "INSERT INTO discente VALUES ('$matricula','$nome','$email','$fone','$curso','$turma','$psswd')";


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
