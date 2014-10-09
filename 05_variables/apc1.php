<?php
// retrieve the old value
$population = apc_fetch('population');
// manipulate the data
$population += ($births + $immigrants - $deaths - $emigrants);
// write the new value back
apc_store('population', $population);
