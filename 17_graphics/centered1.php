<?php
function ImageStringCenter($image, $text, $font) {
    
    // font sizes
    $width  = array(1 => 5, 6, 7, 8, 9);
    $height = array(1 => 6, 8, 13, 15, 15);

    // find the size of the image
    $xi = ImageSX($image);
    $yi = ImageSY($image);

    // find the size of the text
    $xr = $width[$font] * strlen($text);
    $yr = $height[$font];

    // compute centering
    $x = intval(($xi - $xr) / 2);
    $y = intval(($yi - $yr) / 2);

    return array($x, $y);
}
