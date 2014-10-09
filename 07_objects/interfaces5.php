<?php
class Book implements Nameable {
// .. Code here
}
$rc = new ReflectionClass('Book');
if ($rc->implementsInterface('Nameable')) {
  print "Book implements Nameable\n";
}
