<?php
try {
    include_once "../_scripts/sql_db_connector.php";

    $pdo = connect_with_pdo();

    $statement =  $pdo->prepare('SELECT * FROM turma');
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

    echo "
        <label for='turmaid'>
            Turma
        </label>

        <select name='turmaid' id='turmaid'>";
            foreach($result as $row){
                echo "<option value='".$row['id']."'>".strtoupper($row['turma'])."</option>";
            }
    echo"</select>";
} catch (PDOException $exception) {
    handle_pdo_exception($exception);
}