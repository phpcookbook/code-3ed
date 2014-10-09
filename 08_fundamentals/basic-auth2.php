<?php
function validate($user, $pass) {
    /* replace with appropriate username and password checking,
       such as checking a database */
    $users = array('david' => 'fadj&32',
                   'adam'  => '8HEj838');

    if (isset($users[$user]) && ($users[$user] === $pass)) {
        return true;
    } else {
        return false;
    }
}

