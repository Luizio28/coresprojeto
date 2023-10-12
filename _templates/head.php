<?php
function head_constructor($title, $su = false)
{
    session_start();

    $superuser_only = $su;
    $is_sign_in = $title == "sign-in" | $title == "sign-up";

    include "../_scripts/session_validator.php";

    //add if usefull

    //<link rel='preload' href='../node_modules/material-symbols/material-symbols-rounded.woff2' as='font' type='font/woff2' crossorigin>

    echo "
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>

    <link rel='stylesheet' href='../style.css'>
    <link rel='icon' href='../_img/ico.webp'>

    <title>$title</title>
    ";
}
