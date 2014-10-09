<?php
// Prepare
$st = $db->prepare("SELECT sign FROM zodiac WHERE element LIKE ?");
// Execute once
$st->execute(array('fire'));
while ($row = $st->fetch()) {
    print $row[0] . "<br/>\n";
}
// Execute again
$st->execute(array('water'));
while ($row = $st->fetch()) {
    print $row[0] . "<br/>\n";
}
