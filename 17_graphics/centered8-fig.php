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

$w = 400; $h = 120;
$image = ImageCreateTrueColor($w, $h);
ImageFilledRectangle($image, 0, 0, $w-1, $h-1, 0xFFFFFF);

$color = 0x000000;
$text = 'Pack my box with five dozen liquor jugs.';

for ($font = 1, $y = 5; $font <= 5; $font++, $y += 20) {
    list($x) = ImageStringCenter($image, $text, $font);
    ImageString($image, $font, $x, $y, $text, $color);
}

// Send image
header('Content-type: image/png');
ImagePNG($image);

// Clean up
ImageDestroy($image);
