<?php
if (isset($_POST['id']) & isset($_POST['psswd'])) {
    include "../_scripts/sql_db_connector.php";

    try {
        $pdo = connect_with_pdo();

        $statement = $pdo->prepare("SELECT psswd,superuser FROM usuario WHERE id=:id");

        $statement->bindParam(':id', $_POST['id']);

        $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        $valid_username = count($result) == 1;

        if ($valid_username) {
            $valid_password = password_verify($_POST['psswd'], $result[0]['psswd']);

            if ($valid_password) {
                $_SESSION['id'] = $_POST['id'];

                $directory = $result[0]['superuser'] == 1 ? "administrador" : "usuario";

                header("Location: ../$directory/");
                exit;
            }
        }
    } catch (PDOException $exception) {
        handle_pdo_exception($exception);
    }
}
