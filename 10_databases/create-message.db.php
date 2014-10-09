<?php

if (! is_readable('/tmp/message.db')) {
    $db = new PDO('sqlite:/tmp/message.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->exec(file_get_contents(__DIR__ . '/message.sql'));
}
