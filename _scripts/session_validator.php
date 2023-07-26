<?php
$is_signed_in = isset($_SESSION['id']);

$is_superuser = ($superuser_only && $_SESSION['superuser'] == true);
$valid_session = ($is_signed_in && ($is_superuser || !$superuser_only));

if ($is_signed_in && !$valid_session || $is_sign_in && $is_signed_in) {
    header("Location: ../" . $_SESSION['directory'] . "/");
    exit;
} else if (!$is_signed_in && !$valid_session && !$is_sign_in) {
    header("Location: ./sign-in/");
    exit;
}
