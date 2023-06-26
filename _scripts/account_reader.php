<?php
if (isset($_POST['send'])) {
    include "../_scripts/sql_db_connector.php";

    try {
        $pdo = connect_with_pdo();

        $statement = $pdo->prepare("SELECT id,psswd,superuser FROM usuario");
        $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $row) {
            $valid_username = $_POST['id'] == $row['id'];
            $valid_password = password_verify($_POST['psswd'], $row['psswd']);

            if ($valid_username & $valid_password) {
                setcookie('id', $row['id'], time() + 3600, "/");

                $directory = $row['superuser'] == 1? "usuario" : "administrador";

                header("Location: ../$directory/");
            }
        }
    } catch (PDOException $exception) {
        handle_pdo_exception($exception);
    }
}
