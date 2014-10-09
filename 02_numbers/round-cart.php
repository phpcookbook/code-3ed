<?php
$cart = 54.23;
$tax = $cart * .05;
$total = $cart + $tax;
$final = round($total, 2);

print "Tax calculation uses all the digits it needs: $total, but ";
print "round() trims it to two decimal places: $final";
