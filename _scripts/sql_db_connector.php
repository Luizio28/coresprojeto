<?php
function get_database_config()
{
    $server_host = $_SERVER['HTTP_HOST'];
    $is_local = ($server_host == 'localhost:8000' || $server_host == '::1');

    return $is_local ?
        [
            'db_hostname' => 'localhost:3306',
            'db_user' => 'root',
            'db_pass' => '',
            'db_name' => 'requerimentos',
        ] : [
            'db_hostname' => 'remote_server_ip',
            'db_user' => 'remote_username',
            'db_pass' => 'remote_password',
            'db_name' => 'remote_database',
        ];
}

function connect_with_pdo()
{
    $config = get_database_config();
    $dsn = "mysql:host={$config['db_hostname']};dbname={$config['db_name']}";
    return new PDO($dsn, $config['db_user'], $config['db_pass']);
}

function handle_pdo_exception(PDOException $exception)
{
    echo "
    <div class='flex-column'>
        <h1>ERRO</h1>
        
        <div class='box'>
            <p>" . $exception->getMessage() . "</p>
        </div>
    </div>
    ";
}