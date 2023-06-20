<?php #https://www.w3schools.com/howto/howto_js_sort_table.asp use isso no futuro
function echo_requests()
{
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

        $result = $db_connection->query("SELECT * FROM requerimento");

        echo "
        <table>
            <tr>
                <th>id</th>
                <th>discente</th>
                <th>objeto</th>
                <th>data inicio</th>
                <th>data termino</th>
                <th>data registro</th>
                <th>anexo</th>
                <th>observação</th>
                <th>situação</th>
            </tr>
        ";

        while ($row = $result->fetch_assoc()) {
            echo "
            <tr>
                <th>" . $row['id'] . "</th>
                <th>" . $row['discente_id'] . "</th>
                <th>" . $row['objeto'] . "</th>
                <th>" . $row['inicio'] . "</th>
                <th>" . $row['termino'] . "</th>
                <th>" . $row['registro'] . "</th>
                <th>" . $row['anexo'] . "</th>
                <th>" . $row['obs'] . "</th>
                <th>" . $row['situacao'] . "</th>
            </tr>
            ";
        }
        echo "
        </table>
        ";

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
