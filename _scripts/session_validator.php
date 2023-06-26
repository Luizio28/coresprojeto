<?php
//If possible make this less of a mess

$valid_session_id = isset($_SESSION['id']);

if ($is_sign_in & $valid_session_id) {
    header("Location: ../" . $_SESSION['directory'] . "/");
    exit;
}

if ($superuser_only) {
    $is_superuser = $_SESSION['superuser'] == true;
    $valid_session = $is_superuser & $valid_session_id;
} else {
    $valid_session = $valid_session_id;
}


if ($valid_session_id & !$valid_session) {
    header("Location: ../" . $_SESSION['directory'] . "/");
    exit;
} else if (!$valid_session_id & !$valid_session) {
    header("Location: ../sign-in/");
    exit;
}
