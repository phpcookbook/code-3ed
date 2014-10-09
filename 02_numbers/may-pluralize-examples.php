<?php
$number_of_fish = 1;
// $out1 is "I ate 1 fish."
$out1 = "I ate $number_of_fish " . may_pluralize('fish', $number_of_fish) . '.';

$number_of_people = 4;
// $out2 is "Soylent Green is people!
$out2 = 'Soylent Green is ' . may_pluralize('person', $number_of_people) . '!';
