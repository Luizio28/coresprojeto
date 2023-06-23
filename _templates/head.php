<?php
function head_constructor($title)
{
    echo "
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>

    <link rel='stylesheet' href='../style.css'>
    <link rel='icon' href='../_img/ico.webp'>

    <title>$title</title>
    ";
}
