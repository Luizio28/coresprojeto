<?php
/*
$is_signed_in = isset($_SESSION['id']);
$is_superuser = ($superuser_only && $_SESSION['superuser'] == true);

$valid_session = ($is_signed_in && ($is_superuser || !$superuser_only));

if ($valid_session) {
    header("Location: ../" . $_SESSION['directory'] . "/");
    exit;
} else if (!$is_signed_in) {
    header("Location: ./sign-in/");
    exit;
}
*/

$valid_session_id = isset($_SESSION['id']);

if ($superuser_only) {
    $is_superuser = $_SESSION['superuser'] == true;
    $valid_session = $is_superuser & $valid_session_id;
} else {
    $valid_session = $valid_session_id;
}

if ($valid_session_id & !$valid_session | $is_sign_in & $valid_session_id) {
    header("Location: ../" . $_SESSION['directory'] . "/");
    exit;
} else if (!$valid_session_id & !$valid_session & !$is_sign_in) {
    header("Location: ./sign-in/");
    exit;
}
