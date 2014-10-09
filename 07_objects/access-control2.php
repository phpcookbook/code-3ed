<?php
$name   = 'Rasmus Lerdorf';

$sqlite = new PDO('sqlite:/usr/local/users.db');

$rows = $db->query("SELECT email FROM users WHERE name LIKE '$name'");
$row = $rows->fetch();
$email  = $row['email'];
