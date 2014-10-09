<?php
// Select 5 rows, starting after the first 3
foreach ($db->query('SELECT * FROM zodiac ' .
                    'ORDER BY sign LIMIT 5 ' .
                    'OFFSET 3') as $row) {
     // Do something with each row
}
