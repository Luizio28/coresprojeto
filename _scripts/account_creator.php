<?php
if (isset($_POST['send'])) {
    include "../_scripts/sql_db_connector.php";

    try {
        $pdo = connect_with_pdo();

        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        $hashed_password = password_hash($_POST['psswd'], PASSWORD_DEFAULT);

        $statement =  $pdo->prepare("SELECT COUNT(*) as count FROM usuario");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        $is_superuser = $result[0]['count'] == 0 ? 1 : 0;

        $statement = $pdo->prepare("INSERT INTO usuario (id, nome, email, fone, curso, turma, superuser, psswd)
            VALUES (:id, :nome, :email, :fone, :curso, :turma, :superuser, :psswd)");


        $statement->bindParam(':id', $_POST['id']);
        $statement->bindParam(':nome', $_POST['nome']);
        $statement->bindParam(':email', $_POST['email']);
        $statement->bindParam(':fone', $_POST['fone']);
        $statement->bindParam(':curso', $_POST['curso']);
        $statement->bindParam(':turma', $_POST['turma']);
        $statement->bindParam(':superuser', $is_superuser);
        $statement->bindParam(':psswd', $hashed_password);

        $statement->execute();

        $directory = $is_superuser ? "administrador" : "usuario";

        $_SESSION['id'] = $_POST['id'];
        $_SESSION['directory'] = $directory;
        $_SESSION['superuser'] = $is_superuser;

        header("Location: ../$directory/");
        exit;
    } catch (PDOException $exception) {
        handle_pdo_exception($exception);
    }
}
