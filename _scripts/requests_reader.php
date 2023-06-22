<?php #https://www.w3schools.com/howto/howto_js_sort_table.asp use isso no futuro
include "../_scripts/sql_db_connector.php";

function echo_requests()
{
    try {
        $pdo = connect_with_pdo();
    } catch (PDOException $e) {
        echo "
        <div class='flex-column'>
            <h1>ERRO</h1>
            
            <div class='box'>
                <p>" . $e->getMessage() . "</p>
            </div>
        </div>
        ";
    }

    $stmt = $pdo->prepare("SELECT * FROM requerimento");
    $stmt->execute();

    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

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

    foreach ($res as $row) {
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
}
