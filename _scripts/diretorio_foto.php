<?php
if (isset($_POST['send'])) {
    require_once "../_scripts/sql_db_connector.php";
    try {
        $pdo = connect_with_pdo();
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        if (isset($_FILES['foto_perfil'])) {
            $errors = array();
            $maxsize = 1048576; // 1 MB
            $acceptableTypes = array('image/jpeg', 'image/png', 'image/gif');

            if ($_FILES['foto_perfil']['size'] > $maxsize) {
                $errors[] = 'Arquivo muito grande, o limite é 1 MB.';
            }

            if (!in_array($_FILES['foto_perfil']['type'], $acceptableTypes)) {
                $errors[] = 'Tipo de arquivo inválido. Apenas JPEG, PNG e GIF são permitidos.';
            }

            if (count($errors) === 0) {
                $temp = explode(".", $_FILES['foto_perfil']['name']);
                $extension = end($temp);
                $filename = $_SESSION['id'] . "." . $extension;
                $filename = preg_replace("/[^a-zA-Z0-9_.]/", "_", $filename);

                $destination = "../foto/" . $filename;

                move_uploaded_file($_FILES['foto_perfil']['tmp_name'], $destination);

                // Atualize o banco de dados com o caminho da foto de perfil
                $statement = $pdo->prepare("UPDATE usuario SET diretorio_foto = :diretorio_foto WHERE id = :usuario_id");
                $statement->bindParam(':diretorio_foto', $destination);
                $statement->bindParam(':usuario_id', $_SESSION['id']);
                $statement->execute();

                header("Location: ../usuario");
                exit;
            } else {
                foreach ($errors as $error) {
                    echo '<script>alert("' . $error . '");</script>';
                }
            }
        }
    } catch (PDOException $exception) {
        handle_pdo_exception($exception);
    }
}
?>
