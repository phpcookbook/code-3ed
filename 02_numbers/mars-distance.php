<?php
$martian_radius = 3397;
$dist = sphere_distance($lat1, $lon1, $lat2, $lon2, $martian_radius);
$formatted = sprintf("%.2f", $dist * 0.621); // Format and convert to miles
