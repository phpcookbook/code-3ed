<?php
$sth = $dbh->query("SELECT id FROM users WHERE username = $username AND
                    password = $password");
 
if (1 == $sth->numRows()) { 
    $row = $sth->fetchRow(DB_FETCHMODE_OBJECT);
    $id = $row->id;
    if (!empty($id)) {
        $sth = $dbh->query("SELECT * FROM profile WHERE id = $id");
    }
} else {
    "Print bad username and password";
}
