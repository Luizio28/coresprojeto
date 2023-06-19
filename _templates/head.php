<?php
function head_constructor($title)
{
    echo ("
        <meta charset='UTF-8'>
    
        <link rel='stylesheet' href='../_css/style.css'>
        <link rel='icon' href='../_img/ico.webp'>
    
        <title>$title</title>
        ");
}
