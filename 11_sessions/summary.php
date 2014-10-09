<?php
$st = $db->prepare('SELECT COUNT(*)
                     FROM
                        searchsummary
                     WHERE
                        sdate = ?');
$st->execute(array(date('Y-m-d', strtotime('yesterday'))));

$row = $st->fetch();

// no matches in cache
if ($row[0] == 0) {
    $st2 = $db->prepare('SELECT
                          searchterm,
                          source,
                          date(dt) AS sdate,
                          COUNT(*) as searches
                       FROM
                        searches
                       WHERE
                          date(dt) = ?');
   $st2->execute(array(date('Y-m-d', strtotime('yesterday'))));

   $stInsert = $db->prepare('INSERT INTO searchsummary
                             (searchterm,source,sdate,searches)
                             VALUES (?,?,?,?)');
   while ($row = $st2->fetch(PDO::FETCH_NUM)) {
       $stInsert->execute($row);
   }
}
