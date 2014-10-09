<?php
$version = (isset($_SERVER['SITE_VERSION']) ? $_SERVER['SITE_VERSION'] : 'guest');

// redirect to http://guest.example.com, if user fails to sign in correctly
if ('members' == $version) {
    if (!authenticate_user($_POST['username'], $_POST['password'])) {
        header('Location: http://guest.example.com/');
        exit;
    }
}
include_once "${version}_header"; // load custom header
