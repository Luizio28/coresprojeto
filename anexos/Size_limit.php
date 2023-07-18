<?php
if(isset($_FILES['uploaded_file'])) {
    $errors     = array();
    $maxsize    = 2097152;
    $acceptable = array(
        'application/pdf');

    if(($_FILES['uploaded_file']['size'] >= $maxsize) || ($_FILES["uploaded_file"]["size"] == 0)) {
        $errors[] = 'Arquivo muito grande.';
    }

    if((!in_array($_FILES['uploaded_file']['type'], $acceptable)) && (!empty($_FILES["uploaded_file"]["type"]))) {
        $errors[] = 'Arquivo invalido.';
    }

    if(count($errors) === 0) {
        move_uploaded_file($_FILES['uploaded_file']['tmpname'], '/store/to/location.file');
    } else {
        foreach($errors as $error) {
            echo '<script>alert("'.$error.'");</script>';
        }

        die();
    }
}
?>
