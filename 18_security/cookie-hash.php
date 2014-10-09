<?php

/* Define a salt. */
define('SALT', 'flyingturtle');

$name = 'Ellen';

$namecheck = hash_hmac('sha1', $name, SALT);

setcookie('name', implode('|',array($name, $namecheck)));
