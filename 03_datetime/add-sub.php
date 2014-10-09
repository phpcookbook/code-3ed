<?php
$birthday = new DateTime('March 10, 1975');

// When is 40 weeks before $birthday?
$human_gestation = new DateInterval('P40W');
$birthday->sub($human_gestation);
print $birthday->format(DateTime::RFC850);
print "\n";

// What if it was an elephant, not a human?
$elephant_gestation = new DateInterval('P616D');
$birthday->add($elephant_gestation);
print $birthday->format(DateTime::RFC850);
