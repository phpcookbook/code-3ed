<?php
if (! validate($_SERVER['PHP_AUTH_USER'],$_SERVER['PHP_AUTH_PW'])) {
    $realm = 'My Website for '.date('Y-m-d');
    http_response_code(401);
    header('WWW-Authenticate: Basic realm="'.$realm.'"');
    echo "You need to enter a valid username and password.";
    exit;
}
