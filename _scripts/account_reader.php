<table id='table'>
    <thead>
        <tr>
            <th scope='col' onclick='sortTable(0)'>id</th>
            <th scope='col' onclick='sortTable(1)'>turma</th>
            <th scope='col' onclick='sortTable(2)'>nome</th>
            <th scope='col' onclick='sortTable(3)'>email</th>
            <th scope='col' onclick='sortTable(4)'>fone</th>
            <th scope='col' onclick='sortTable(5)'>admin</th>
        </tr>
    </thead>

    <?php
    require_once "../_scripts/sql_db_connector.php";
    try {
        $pdo = connect_with_pdo();

        $statement = $pdo->prepare("SELECT id,nome,email,fone,superuser,turmaid FROM usuario");
        $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);


        foreach ($result as $row) {
            $statement = $pdo->prepare("SELECT turma FROM turma WHERE id = :turmaid");
            $statement->bindParam(':turmaid', $row['turmaid']);
            $statement->execute();

            $result2 = $statement->fetchAll(PDO::FETCH_ASSOC);

            $turma = $result2[0]['turma'];

            echo "
            <tr>
                <td>" . $row['id'] . "</td>
                <td>" . $row['turmaid'] . "</td>
                <td>" . $row['nome'] . "</td>
                <td>" . $row['email'] . "</td>
                <td>" . $row['fone'] . "</td>
                <td class='break-text'>" . $row['superuser'] . "</td>
                <td>
                    <form action='../usuario-alterar' method='get'>
                        <input name='id' type='hidden' value=".$row['id']."></input>
                        <button type='submit'>editar</button>
                    </form>
                </td>
            </tr>
            </tr>
            ";
        }
    } catch (PDOException $exception) {
        handle_pdo_exception($exception);
    }

    ?>
</table>