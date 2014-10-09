<?php

/* Initialize an array for filtered data. */
$clean = array();

/* Define a salt. */
define('SALT', 'flyingturtle');

if (hash_hmac('sha1', $_POST['id'], SALT) === $_POST['idcheck']) {
    $clean['id'] = $_POST['id'];
} else {
    /* Error */
}
