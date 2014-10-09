<?php
// A list of field names
$fields = array('symbol','planet','element');
$placeholders = array();
$values = array();
foreach ($fields as $field) {
    // One placeholder per field
    $placeholders[] = '?';
    // Assume the data is coming from a form
    $values[] = $_POST[$field];
}

$st = $db->prepare('INSERT INTO zodiac (' .
                   implode(',',$fields) .
                   ') VALUES (' .
                   implode(',', $placeholders) .
                   ')');
// Execute the query
$st->execute($values);
