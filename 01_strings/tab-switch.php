<?php
$rows = $db->query('SELECT message FROM messages WHERE id = 1');
$obj = $rows->fetch(PDO::FETCH_OBJ);

$tabbed = str_replace(' ' , "\t", $obj->message);
$spaced = str_replace("\t", ' ' , $obj->message);

print "With Tabs: <pre>$tabbed</pre>";
print "With Spaces: <pre>$spaced</pre>";
