<?php
extract($_POST);

if (isset($send)) {
    $db_hostname = 'localhost';
    $db_user = 'root';
    $db_pass = '';
    $db_name = 'requerimentos';

    $db_consult = "INSERT INTO requerimento VALUES ('$id','$discente_id','$objeto','$inicio','$termino','$registro','$anexos','$obs','$situacao')";

    $db_connection = new mysqli($db_hostname, $db_user, $db_pass, $db_name);

    $sql_query = mysqli_query($db_connection, $db_consult);

    if ($db_connection->connect_errno) {
        echo 'Erro - não foi possível conectar com o SQL';
    }
}
