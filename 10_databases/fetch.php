<?php
$rows = $db->query('SELECT symbol,planet FROM zodiac ORDER BY planet');
$firstRow = $rows->fetch();
print "The first results are that {$firstRow['symbol']} goes with {$firstRow['planet']}";
