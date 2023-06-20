<?php #https://www.w3schools.com/howto/howto_js_sort_table.asp use isso no futuro
function echo_requests()
{
    try {
        $db_hostname = 'localhost';
        $db_user = 'root';
        $db_pass = '';
        $db_name = 'requerimentos';

        $conn = new mysqli($db_hostname, $db_user, $db_pass, $db_name);

        $result = $conn->query("SELECT * FROM requerimento");

        if (!$result) {
            echo "Error: " . $conn->error;
        } else {echo "
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
                    <th>". $row['id'] ."</th>
                    <th>". $row['discente_id'] ."</th>
                    <th>". $row['objeto'] ."</th>
                    <th>". $row['inicio'] ."</th>
                    <th>". $row['termino'] ."</th>
                    <th>". $row['registro'] ."</th>
                    <th>". $row['anexo'] ."</th>
                    <th>". $row['obs'] ."</th>
                    <th>". $row['situacao'] ."</th>
                </tr>";
                }
                echo "
            </table>";
        }

        $conn->close();
    } catch (Throwable $th) {
        $conn = NULL;
        echo ("
            <div class='box flex-column'>
                <p>
                    não foi possível conectar ao banco de dados :(
                </p>
            </div>
        ");
    }
}
