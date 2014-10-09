<?php
$dbh = dba_open('users.db','c','db4') or die($php_errormsg);

// read in and unserialize the data
$exists = dba_exists($_POST['username'], $dbh);
if ($exists) {
    $serialized_data = dba_fetch($_POST['username'], $dbh) or die($php_errormsg);
    $data = unserialize($serialized_data);
} else {
    $data = array();
}

// update values
if ($_POST['new_password']) {
    $data['password'] = $_POST['new_password'];
}
$data['last_access'] = time();

// write data back to file
if ($exists) {
    dba_replace($_POST['username'],serialize($data), $dbh);
} else {
    dba_insert($_POST['username'],serialize($data), $dbh);
}

dba_close($dbh);
