<?php
function ImageFTCenter($image, $size, $angle, $font, $text, $extrainfo = array()) {

    // find the size of the image
    $xi = ImageSX($image);
    $yi = ImageSY($image);

    // find the size of the text
    $box = ImageFTBBox($size, $angle, $font, $text, $extrainfo);

    $xr = abs(max($box[2], $box[4]));
    $yr = abs(max($box[5], $box[7]));

    // compute centering
    $x = intval(($xi - $xr) / 2);
    $y = intval(($yi + $yr) / 2);

    return array($x, $y);
}


// Create the image
$image = imagecreatetruecolor(800, 60);

// Create some colors
$white = imagecolorallocate($image, 255, 255, 255);
$grey = imagecolorallocate($image, 128, 128, 128);
$black = imagecolorallocate($image, 0, 0, 0);
imagefilledrectangle($image, 0, 0, 399, 29, $black);

// The text to draw
$text = 'Testing...';
// Replace path by your own font path
$font = __DIR__ . '/stocky/stocky.TTF';
$size = 30;
$angle = 0;

list($x, $y) = ImageFTCenter($image, $size, $angle, $font, $text);

// Add some shadow to the text
//imagefttext($image, $size, $angle, $x + 1, $y + 1, $grey, $font, $text);

// Add the text
imagefttext($image, $size, $angle, $x, $y, $white, $font, $text);


// Set the content-type
header('Content-Type: image/png');

// Using imagepng() results in clearer text compared with imagejpeg()
imagepng($image);
imagedestroy($image);
?>