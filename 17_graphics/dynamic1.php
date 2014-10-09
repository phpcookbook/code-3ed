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


$_GET['text'] = 'I <3 PHP!';

// Configuration settings
$image    = ImageCreateFromPNG(__DIR__ . '/button.png');
$text     = $_GET['text'];
$font     = '/Library/Fonts/Hei.ttf';
$size     = 24;
$color    = 0x000000;
$angle    = 0;

// Print-centered text
list($x, $y) = ImageFTCenter($image, $size, $angle, $font, $text);
ImageFTText($image, $size, $angle, $x, $y, $color, $font, $text);

// Preserve Transparency
ImageColorTransparent($image, 
    ImageColorAllocateAlpha($image, 0, 0, 0, 127));
ImageAlphaBlending($image, false);
ImageSaveAlpha($image, true);

// Send image
header('Content-type: image/png');
ImagePNG($image);

// Clean up
ImagePSFreeFont($font);
ImageDestroy($image);
