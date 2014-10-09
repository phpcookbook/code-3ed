<?php
class convert {
 // convert from Celsius to Fahrenheit
 public static function c2f($degrees) {
   return (1.8 * $degrees) + 32;
 }
}

$f = convert::c2f(100); // 212
