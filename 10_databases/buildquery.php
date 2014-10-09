<?php
function build_query($db,$key_field,$fields,$table) {
    $values = array();
    if (! empty($_POST[$key_field])) {
        $update_fields = array();
        foreach ($fields as $field) {
            $update_fields[] = "$field = ?";
            // Assume the data is coming from a form
            $values[] = $_POST[$field];
        }
        // Add the key field's value to the $values array
        $values[] = $_POST[$key_field];
        $st = $db->prepare("UPDATE $table SET " .
                   implode(',', $update_fields) .
                   "WHERE $key_field = ?");
    } else {
        // Start values off with a unique ID
        // If your DB is set to generate this value, use NULL instead
        $values[] = md5(uniqid());
        $placeholders = array('?');
        foreach ($fields as $field) {
            // One placeholder per field
            $placeholders[] = '?';
            // Assume the data is coming from a form
            $values[] = $_POST[$field];
        }
        $st = $db->prepare("INSERT INTO $table ($key_field," .
                           implode(',',$fields) . ') VALUES ('.
                           implode(',',$placeholders) .')');
    }
    $st->execute($values);
    return $st;
}
