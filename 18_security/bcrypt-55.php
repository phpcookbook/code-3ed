<?php

/* Initialize an array for filtered data. */
$clean = array();

/* Hash the password. */
$hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

/* Allow alphanumeric usernames. */
if (ctype_alnum($_POST['username'])) {
    $clean['username'] = $_POST['username'];
} else {
    /* Error */
}

/* Store user in the database. */
$st = $db->prepare('INSERT
            INTO   users (username, password)
            VALUES (?, ?)');
$st->execute(array($clean['username'], $hashed_password));
