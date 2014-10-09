<?php
$book_collection = array('Emma', 'Pride and Prejudice', 'Northhanger Abbey');
$book = 'Sense and Sensibility';

if (in_array($book, $book_collection)) { 
    echo 'Own it.';
} else {
    echo 'Need it.';
}
