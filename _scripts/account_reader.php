<?php
if (isset($_POST['id']) & isset($_POST['psswd'])) {
    require_once "../_scripts/sql_db_connector.php";
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
                $directory = $result[0]['superuser'] == 1 ? "administrador" : "usuario";

                $_SESSION['id'] = $_POST['id'];
                $_SESSION['directory'] = $directory;
                $_SESSION['superuser'] = $result[0]['superuser'];

                header("Location: ../$directory/");
                exit;
            }
        }
        echo "
        <div class='flex-column'>
            <h1>ERRO</h1>
            
            <div class='box flex-column'>
                <p>Credenciais inválidas</p>
            </div>
        </div>
        ";
    } catch (PDOException $exception) {
        handle_pdo_exception($exception);
    }
}
