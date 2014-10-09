<?php
$st = $db->query('SELECT planet, element FROM zodiac');
$results = $st->fetchAll();
foreach ($results as $i => $result) {
   print "Planet $i is {$result['planet']} <br/>\n";
}
