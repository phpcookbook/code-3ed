<?php
// $ok is true - March 10, 1993 is a valid date
$ok = checkdate(3, 10, 1993);
// $not_ok is false - February 30, 1962 is not a valid date
$not_ok = checkdate(2, 30, 1962);
