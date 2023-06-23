<?php #https://www.w3schools.com/howto/howto_js_sort_table.asp use isso no futuro
function echo_requests()
{
    include "../_scripts/sql_db_connector.php";

    try {
        $pdo = connect_with_pdo();

        $stmt = $pdo->prepare("SELECT * FROM requerimento");
        $stmt->execute();

        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo "
        <table>
            <thead>
                <tr>
                    <th scope='col'>id</th>
                    <th scope='col'>usuario</th>
                    <th scope='col'>objeto</th>
                    <th scope='col'>data inicio</th>
                    <th scope='col'>data termino</th>
                    <th scope='col'>data registro</th>
                    <th scope='col'>anexo</th>
                    <th scope='col'>observação</th>
                    <th scope='col'>situação</th>
                </tr>
            </thead>
        ";

        foreach ($res as $row) {
            echo "
            <tr>
                <td>" . $row['id'] . "</td>
                <td>" . $row['usuario_id'] . "</td>
                <td>" . $row['objeto'] . "</td>
                <td>" . $row['inicio'] . "</td>
                <td>" . $row['termino'] . "</td>
                <td>" . $row['registro'] . "</td>
                <td>" . $row['anexo'] . "</td>
                <td>" . $row['obs'] . "</td>
                <td>" . $row['situacao'] . "</td>
            </tr>
            ";
        }
        echo "
        </table>
        ";
    } catch (PDOException $e) {
        handle_pdo_exception($e);
    }
}
