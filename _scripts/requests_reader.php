<table id='table'>
    <thead>
        <tr>
            <th scope='col' onclick='sortTable(0)'>
                <span class='material-symbols-outlined unselectable'>
                    unfold_more
                </span>
            </th>
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

    <?php
    include "../_scripts/sql_db_connector.php";

    try {
        $pdo = connect_with_pdo();

        $statement = $pdo->prepare("SELECT * FROM requerimento");
        $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

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
    } catch (PDOException $exception) {
        handle_pdo_exception($exception);
    }

    ?>
</table>

<script>
    //Código descaradamente """"inpirado"""" nesse aqui ó
    //https://www.w3schools.com/howto/tryit.asp?filename=tryhow_js_sort_table_desc
    function sortTable(n) {
        var rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
        switching = true;
        //Set the sorting direction to ascending:
        dir = 'asc';
        /*Make a loop that will continue until
        no switching has been done:*/
        while (switching) {
            //start by saying: no switching is done:
            switching = false;
            rows = table.rows;
            /*Loop through all table rows (except the
            first, which contains table headers):*/
            for (i = 1; i < (rows.length - 1); i++) {
                //start by saying there should be no switching:
                shouldSwitch = false;
                /*Get the two elements you want to compare,
                one from current row and one from the next:*/
                x = rows[i].getElementsByTagName('TD')[n];
                y = rows[i + 1].getElementsByTagName('TD')[n];
                /*check if the two rows should switch place,
                based on the direction, asc or desc:*/
                if (dir == 'asc') {
                    if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                        //if so, mark as a switch and break the loop:
                        shouldSwitch = true;
                        break;
                    }
                } else if (dir == 'desc') {
                    if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                        //if so, mark as a switch and break the loop:
                        shouldSwitch = true;
                        break;
                    }
                }
            }
            if (shouldSwitch) {
                /*If a switch has been marked, make the switch
                and mark that a switch has been done:*/
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
                //Each time a switch is done, increase this count by 1:
                switchcount++;
            } else {
                /*If no switching has been done AND the direction is 'asc',
                set the direction to 'desc' and run the while loop again.*/
                if (switchcount == 0 && dir == 'asc') {
                    dir = 'desc';
                    switching = true;
                }
            }
        }
    }
</script>