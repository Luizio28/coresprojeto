<?php #Código descaradamente """"inpirado"""" nesse aqui ó https://www.w3schools.com/howto/tryit.asp?filename=tryhow_js_sort_table_desc
function echo_requests()
{
    include "../_scripts/sql_db_connector.php";

    try {
        $pdo = connect_with_pdo();

        $stmt = $pdo->prepare("SELECT * FROM requerimento");
        $stmt->execute();

        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo "
        <table id='table' class'standard-width'>
            <thead>
                <tr>
                    <th scope='col' onclick='sortTable(0)'>id</th>
                    <th scope='col' onclick='sortTable(1)'>usuario</th>
                    <th scope='col' onclick='sortTable(2)'>objeto</th>
                    <th scope='col' onclick='sortTable(3)'>inicio</th>
                    <th scope='col' onclick='sortTable(4)'>termino</th>
                    <th scope='col' onclick='sortTable(5)'>registro</th>
                    <th scope='col' onclick='sortTable(6)'>anexo</th>
                    <th scope='col' onclick='sortTable(7)'>observação</th>
                    <th scope='col' onclick='sortTable(8)'>situação</th>
                </tr>
            </thead>
        ";

        foreach ($res as $row) {
            $object = "";
            switch ($row['objeto']) {
                case "0":
                    $object = "Jus. falta";
                    break;
                case "1":
                    $object = "2° chamada";
                    break;
            }

            $situation = "";
            switch ($row['objeto']) {
                case "0":
                    $situation = "Indeferido";
                    break;
                case "1":
                    $situation = "Deferido";
                    break;
                case "2":
                    $situation = "Protocolado";
                    break;
                case "3":
                    $situation = "Concluído";
                    break;
            }

            echo "
            <tr>
                <td>" . $row['id'] . "</td>
                <td>" . $row['usuario_id'] . "</td>
                <td>" . $object . "</td>
                <td>" . $row['inicio'] . "</td>
                <td>" . $row['termino'] . "</td>
                <td>" . $row['registro'] . "</td>
                <td class='break-text'>" . $row['anexo'] . "</td>
                <td class='break-text'>" . $row['obs'] . "</td>
                <td>" . $situation . "</td>
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
