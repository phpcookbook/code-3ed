<?php
$number = "5,100";

// This is_numeric() call returns false
$withCommas = is_numeric($number);

// This is_numeric() call returns true
$withoutCommas = is_numeric(str_replace(',', '', $number));
