<?php
if (isset($_POST['send'])) {
    require_once "../_scripts/sql_db_connector.php";
    try {
        $pdo = connect_with_pdo();

        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        $hashed_password = password_hash($_POST['psswd'], PASSWORD_DEFAULT);

        $statement =  $pdo->prepare("SELECT COUNT(*) as count FROM usuario");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        $is_superuser = $result[0]['count'] == 0 ? 1 : 0;

        $statement = $pdo->prepare("INSERT INTO usuario (id, nome, email, fone, superuser, psswd, turmaid)
            VALUES (:id, :nome, :email, :fone, :superuser, :psswd, :turmaid)");


        $statement->bindParam(':id', $_POST['id']);
        $statement->bindParam(':nome', $_POST['nome']);
        $statement->bindParam(':email', $_POST['email']);
        $statement->bindParam(':fone', $_POST['fone']);
        $statement->bindParam(':superuser', $is_superuser);
        $statement->bindParam(':psswd', $hashed_password);
        $statement->bindParam(':turmaid', $_POST['turmaid']);

        $statement->execute();

        $directory = $is_superuser ? "administrador" : "usuario";

        $_SESSION['id'] = $_POST['id'];
        $_SESSION['turmaid'] = $_POST['turmaid'];
        $_SESSION['directory'] = $directory;
        $_SESSION['superuser'] = $is_superuser;

        header("Location: ../$directory/");
        exit;
    } catch (PDOException $exception) {
        handle_pdo_exception($exception);
    }
}
