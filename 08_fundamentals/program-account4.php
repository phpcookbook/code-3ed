<?php
// Connect to the database
$db = new PDO('sqlite:users.db');

$window = '-7 days';

$sth = $db->prepare("DELETE FROM users WHERE verified = 0 AND ".
                    "created_on < datetime('now',?)");
$res = $sth->execute(array($window));

if ($res) {
    print "Deactivated " . $sth->rowCount() . " users.\n";
} else {
    print "Can't delete users.\n";
}
