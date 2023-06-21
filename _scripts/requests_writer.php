<?php
extract($_POST);

if (isset($send)) {
    try {
        $db_connection = connect_to_db();

        $db_consult = "INSERT INTO requerimento VALUES ('$discente_id','$objeto', '$inicio', '$termino', '$anexos', '$obs', '$situacao')";

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
