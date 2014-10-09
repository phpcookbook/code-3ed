<?php
function ImagePSCenter($image, $text, $font, $size, $space = 0,
                           $tightness = 0, $angle = 0) {

    // find the size of the image
    $xi = ImageSX($image);
    $yi = ImageSY($image);

    // find the size of the text 
    list($xl, $yl, $xr, $yr) = ImagePSBBox($text, $font, $size,
                                     $space, $tightness, $angle);

    // compute centering 
    $x = intval(($xi - $xr) / 2);
    $y = intval(($yi + $yr) / 2);

    return array($x, $y);
}

$image = ImageCreate(500,500);
$text = 'PHP Cookbook Rules!';
$font = ImagePSLoadFont('/path/to/font.pfb');
$size = 20;
$black = 0x000000;
$white = 0xFFFFFF;

list($x, $y) = ImagePSCenter($image, $text, $font, $size);
ImagePSText($image, $text, $font, $size, $white, $black, $x, $y);
ImagePSFreeFont($font); 

header('Content-type: image/png');
ImagePng($image);

ImageDestroy($image);
