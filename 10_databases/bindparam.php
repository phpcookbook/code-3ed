<?php
$pairs = array('Mars' => 'water',
               'Moon' => 'water',
               'Sun' => 'fire');
$st = $db->prepare(
    "SELECT sign FROM zodiac WHERE element LIKE :element AND planet LIKE :planet");
$st->bindParam(':element', $element);
$st->bindparam(':planet', $planet);
foreach ($pairs as $planet => $element) {
    // No need to pass anything to execute() --
    // the values come from $element and $planet
    $st->execute();
    var_dump($st->fetch());
}
