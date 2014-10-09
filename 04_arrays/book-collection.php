<?php

$book_collection = array('Emma',
                         'Pride and Prejudice',
                         'Northhanger Abbey');

// convert from numeric array to associative array
$book_collection = array_flip($book_collection);
$book = 'Sense and Sensibility';

if (isset($book_collection[$book])) { 
    echo 'Own it.';
} else {
    echo 'Need it.';
}
