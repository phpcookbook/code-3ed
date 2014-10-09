<?php
// good
setcookie("name", $name);
print "Hello $name!";

// bad
print "Hello $name!";
setcookie("name", $name);

// good
setcookie("name",$name); ?>
<html><title>Hello</title>
