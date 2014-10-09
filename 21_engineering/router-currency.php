<?php
$parts = explode('/', $_SERVER['REQUEST_URI']);
// Expecting a request URI such as /USD/ISK, so make
// sure there are at least two parts and they are
// each three letters
if (! (isset($parts[1]) &&
       preg_match('/[a-z]{3}/i', $parts[1]) &&
       isset($parts[2]) &&
       preg_match('/[a-z]{3}/i', $parts[2]))) {
    header('Bad Request', true, 400);
    print "Bad Request";
    exit();
}

$pattern = 'http://download.finance.yahoo.com/d/quotes.csv?f=nl1&s=%s%s=X,%s%s=X';
$url = sprintf($pattern,
               urlencode($parts[1]), urlencode($parts[2]),
               urlencode($parts[2]), urlencode($parts[1]));
$response = file_get_contents($url);
$lines = explode("\n", trim($response));
foreach ($lines as $line) {
    list($label, $rate) = str_getcsv($line);
    print "<b>" . htmlentities($label) . "</b>: " . htmlentities($rate) . "<br/>";
}
