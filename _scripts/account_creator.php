<?php
extract($_POST);

if (isset($send)) {
    //To do: make so this info works on local and server
    $db_hostname = 'localhost';
    $db_user = 'root';
    $db_pass = '';
    $db_name = 'requerimentos';

    $db_consult = "INSERT INTO requerimento VALUES ('$matricula','$nome','$email','$fone','$curso','$turma','$psswd')";

    $db_connection = new mysqli($db_hostname, $db_user, $db_pass, $db_name);

    $sql_query = mysqli_query($db_connection, $db_consult);
}
