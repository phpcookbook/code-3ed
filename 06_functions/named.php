<?php
function image($img) {
    $tag  = '<img src="' . $img['src'] . '" ';
    $tag .= 'alt="' . (isset($img['alt']) ? $img['alt'] : '') .'"/>';
    return $tag;
}

// $image1 is '<img src="cow.png" alt="cows say moo"/>'
$image1 = image(array('src' => 'cow.png', 'alt' => 'cows say moo'));

// $image2 is '<img src="pig.jpeg" alt=""/>'
$image2 = image(array('src' => 'pig.jpeg'));
