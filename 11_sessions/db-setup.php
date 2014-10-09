<?php

include __DIR__ . '/db.php';

$handler = new DBHandler();
$handler->createTable('sqlite:/tmp/sessions.db', session_name());
