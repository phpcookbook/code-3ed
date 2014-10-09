<?php
unset($username);
if (isset($_COOKIE['login'])) {
    list($c_username, $cookie_hash) = split(',', $_COOKIE['login']);
    if (md5($c_username.$secret_word) == $cookie_hash) {
        $username = $c_username;
    } else {
        print "You have sent a bad cookie.";
    }
}

if (isset($username)) {
    print "Welcome, $username.";
} else {
    print "Welcome, anonymous user.";
}
