<?php
if (! validate($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW'])) {
    http_response_code(401);
    header('WWW-Authenticate: Basic realm="My Website"');
    echo "You need to enter a valid username and password.";
    exit;
}
