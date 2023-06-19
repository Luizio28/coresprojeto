<?php
function echo_contacts()
{
    try {
        $conn = new mysqli("localhost", "root", "", "requerimentos");

        $result = $conn->query("SELECT * FROM requerimento");

        if (!$result) {
            echo "Error: " . $conn->error;
        } else {
            while ($row = $result->fetch_assoc()) {
                $nome = $row['nome'];
                $email = $row['email'];
                $fone = $row['fone'];

                echo '
                    <div class="box flex-column">
                        <h1>' . $nome . '</h1>
                        <div class="flex-row spaced-between">
                            <p>e-mail</p>   
                            <p>' . $email . '</p>
                        </div>
                        <div class="flex-row spaced-between">
                            <p>N° telefone</p>
                            <p>' . "(" . substr($fone, 0, 2) . ") " . substr($fone, 2, 5) . "-" . substr($fone, 7) . '</p>
                        </div>
                    </div>
                ';
            }
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