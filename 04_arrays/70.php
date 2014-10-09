<?php
$movies = array(/* ... */);

$flops = array_filter($movies, function ($movie) {
    return ($movie['box_office_gross'] < 5000000) ? 1 : 0;
});
