<?php
// Connect to the database
$db = new PDO('sqlite:users.db');

$sth = $db->prepare('UPDATE users SET verified = 1 WHERE email = ? '.
                    ' AND verify_string = ? AND verified = 0');
                    
$res = $sth->execute(array($_GET['email'], $_GET['verify_string']));
var_dump($res, $sth->rowCount());
if (! $res) {
    print "Please try again later due to a database error.";
} else {
    if ($sth->rowCount() == 1) {
        print "Thank you, your account is verified.";
    } else {
        print "Sorry, you could not be verified.";
    }
}
