<table id='table'>
    <?php
    require_once "../_scripts/sql_db_connector.php";
    try {
        $pdo = connect_with_pdo();

        $statement = $pdo->prepare("SELECT * FROM requerimento");
        $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        if (count($result) > 0) {
            echo "
                <thead>
                    <tr>
                        <th scope='col' onclick='sortTable(0)'>
                            <span class='material-symbols-outlined unselectable'>
                            unfold_more
                            </span>
                        </th>
                        <th scope='col' onclick='sortTable(1)'>objeto</th>
                        <th scope='col' onclick='sortTable(2)'>usuario</th>
                        <th scope='col' onclick='sortTable(3)'>turma</th>
                        <th scope='col' onclick='sortTable(4)'>registro</th>
                        <th scope='col' onclick='sortTable(5)'>inicio</th>
                        <th scope='col' onclick='sortTable(6)'>termino</th>
                        <th scope='col' onclick='sortTable(7)'>observação</th>
                        <th scope='col' onclick='sortTable(8)'>anexo</th>
                        <th scope='col' onclick='sortTable(9)'>situação</th>
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

                $statement = $pdo->prepare("SELECT turma FROM turma WHERE id = :turmaid");
                $statement->bindParam(':turmaid', $row['turmaid']);
                $statement->execute();

                $result2 = $statement->fetchAll(PDO::FETCH_ASSOC);

                $turma = $result2[0]['turma'];
        
                echo "
            <tr>
                <td>" . $row['id'] . "</td>
                <td>" . $object . "</td>
                <td>" . $row['usuario_id'] . "</td>
                <td>" . $turma . "</td>
                <td>" . $row['registro'] . "</td>
                <td>" . $row['inicio'] . "</td>
                <td>" . $row['termino'] . "</td>
                <td class='break-text'>" . $row['obs'] . "</td>
                <td class='break-text'><a href= ../anexo/" . $row['diretorio_anexo'] . "  target='_blank'>link</a></td>
                <td>" . $situation . "</td>
                <td>
                <form action='../requerimento-apagar' method='post'>
                    <input name='id' type='hidden' value=".$row['id']."></input>
                    <button type='submit'>apagar</button>
                </form>
                </td>
                <td>
                    <form action='../requerimento-alterar' method='post'>
                        <input name='id' type='hidden' value=".$row['id']."></input>
                        <button type='submit'>editar</button>
                    </form>
                </td>
            </tr>
            ";

            }
        } else {
            echo "<p>Não há requerimentos registrados no banco de dados</p>";
        }
    } catch (PDOException $exception) {
        handle_pdo_exception($exception);
    }
    ?>
</table>