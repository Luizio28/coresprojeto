<table id='table'>
    <?php
    include "../_scripts/sql_db_connector.php";

    try {
        $pdo = connect_with_pdo();
		
        $statement = $pdo->prepare("SELECT objeto, inicio, termino, registro, obs, diretorio_anexo, situacao FROM requerimento WHERE usuario_id = ".$_SESSION['id']."");
        $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        if (count($result) > 0) {
            echo "
                <thead>
                        <th scope='col' onclick='sortTable(0)'>objeto</th>
                        <th scope='col' onclick='sortTable(1)'>registro</th>
                        <th scope='col' onclick='sortTable(2)'>inicio</th>
                        <th scope='col' onclick='sortTable(3)'>termino</th>
                        <th scope='col' onclick='sortTable(4)'>observação</th>
                        <th scope='col' onclick='sortTable(5)'>anexo</th>
                        <th scope='col' onclick='sortTable(6)'>situação</th>
                    </tr>
                </thead>
                ";

            foreach ($result as $row) {
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
                switch ($row['situacao']) {
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
                <td>" . $object . "</td>
                <td>" . $row['registro'] . "</td>
                <td>" . $row['inicio'] . "</td>
                <td>" . $row['termino'] . "</td>
                <td class='break-text'>" . $row['obs'] . "</td>
                <td class='break-text'><a href= ../anexo/" . $row['diretorio_anexo'] . "  target='_blank'>link</a></td>
                <td>" . $situation . "</td>
            </tr>
            ";
            }
        } else {
            echo "<p>Nenhum requerimento encontrado</p>";
        }
    } catch (PDOException $exception) {
        handle_pdo_exception($exception);
    }

    ?>
</table>