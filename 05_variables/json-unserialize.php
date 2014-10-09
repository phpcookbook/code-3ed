<?php
// $new_pantry will be the array:
//  array('sugar' => '2 lbs.','butter' => '3 sticks')
$new_pantry = json_decode(file_get_contents('/tmp/pantry.json'), TRUE);
