<?php

/* Define a salt. */
define('SALT', 'flyingturtle');

list($cookie_value, $cookie_check) = explode('|', $_COOKIE['name'], 2);

if (hash_hmac('sha1', $cookie_value, SALT) === $cookie_check) {
    $clean['name'] = $cookie_value;
} else {
    /* Error */
}
