<table id='table'>
    <thead>
        <tr>
            <th scope='col' onclick='sortTable(0)'>id</th>
            <th scope='col' onclick='sortTable(1)'>nome</th>
            <th scope='col' onclick='sortTable(2)'>email</th>
            <th scope='col' onclick='sortTable(3)'>fone</th>
            <th scope='col' onclick='sortTable(4)'>curso</th>
            <th scope='col' onclick='sortTable(5)'>turma</th>
            <th scope='col' onclick='sortTable(6)'>admin</th>
        </tr>
    </thead>

    <?php
    include "../_scripts/sql_db_connector.php";

    try {
        $pdo = connect_with_pdo();

        $statement = $pdo->prepare("SELECT id,nome,email,fone,curso,turma,superuser FROM usuario");
        $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $row) {
            $object = "";
            switch ($row['superuser']) {
                case "0":
                    $object = "Jus. falta";
                    break;
                case "1":
                    $object = "2° chamada";
                    break;
            }

            echo "
            <tr>
                <td>" . $row['id'] . "</td>
                <td>" . $row['nome'] . "</td>
                <td>" . $row['email'] . "</td>
                <td>" . $row['fone'] . "</td>
                <td>" . $row['curso'] . "</td>
                <td>" . $row['turma'] . "</td>
                <td class='break-text'>" . $row['superuser'] . "</td>
            </tr>
            ";
        }
    } catch (PDOException $exception) {
        handle_pdo_exception($exception);
    }

    ?>
</table>