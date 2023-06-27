<?php
function head_constructor($title, $su = false)
{
    session_start();

    $superuser_only = $su;
    $is_sign_in = $title == "sign-in" | $title == "sign-up";

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
        header("Location: ../sign-in/");
        exit;
    }

    //add if usefull

    //<link rel='preload' href='../node_modules/material-symbols/material-symbols-rounded.woff2' as='font' type='font/woff2' crossorigin>

    echo "
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>

    <link href='../node_modules/material-symbols/index.css' rel='stylesheet'>

    <link rel='stylesheet' href='../style.css'>
    <link rel='icon' href='../_img/ico.webp'>

    <title>$title</title>
    ";
}
