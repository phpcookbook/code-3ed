<?php
$ads = array('ford' => 12234, // advertiser, remaining impressions
             'att'  => 33424,
             'ibm'  => 16823);

$ad = rand_weighted($ads);
