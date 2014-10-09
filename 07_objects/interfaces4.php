<?php
class Book implements Nameable {
    // .. Code here
}

$interfaces = class_implements('Book');
if (isset($interfaces['Nameable'])) {
    // Book implements Nameable
}
