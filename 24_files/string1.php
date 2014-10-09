<?php
$people = file_get_contents('people.txt');
if (preg_match('/Names:.*(David|Susannah)/i',$people)) {
    print "people.txt matches.";
}
