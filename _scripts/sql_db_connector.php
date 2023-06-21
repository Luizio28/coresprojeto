<?php

//high DRYification potential

function connect_to_db()
{
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

    return new mysqli($db_hostname, $db_user, $db_pass, $db_name);
}

function connect_with_pdo()
{
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

    return new PDO("mysql:host=$db_hostname;dbname=$db_name", $db_user, $db_pass);
}
