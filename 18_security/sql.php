<?php
$statement = $db->prepare("INSERT
                             INTO   users (username, password)
                             VALUES (:username, :password)");

$statement->bindParam(':username', $clean['username']);
$statement->bindParam(':password', $clean['password']);

$statement->execute();
