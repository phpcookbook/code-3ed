<?php
$pantry = array('sugar' => '2 lbs.','butter' => '3 sticks');
$fp = fopen('/tmp/pantry.json','w') or die ("Can't open pantry");
fputs($fp,json_encode($pantry));
fclose($fp);
