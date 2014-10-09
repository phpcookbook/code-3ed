<?php
$tests = array('test1.php', 'test10.php', 'test11.php', 'test2.php');

// sort in reverse natural order
usort($tests, function ($a, $b) {
    return strnatcmp($b, $a);
});
