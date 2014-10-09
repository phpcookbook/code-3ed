<?php

/* Initialize an array for filtered data. */
$clean = array();

/* Allow alphanumeric usernames. */
if (ctype_alnum($_POST['username'])) {
    $clean['username'] = $_POST['username'];
} else {
    /* Error */
}

$stmt = $db->prepare('SELECT password
                      FROM   users
                      WHERE  username = ?');
$stmt->execute(array($clean['username']));
$hashed_password = $stmt->fetchColumn();

$salt = substr($hashed_password, 0, strlen('$2a$08$') + 22);

if (crypt($_POST['password'], $salt) === $hashed_password) {
    /* Login succeeds. */
    print "Login OK!";
} else {
    /* Login fails. */
}
