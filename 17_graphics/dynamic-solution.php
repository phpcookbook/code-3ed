<?php
include 'imageftcenter.php';

// Configuration settings
$image    = ImageCreateFromPNG('/path/to/button.png'); // Template image
$size     = 24;
$angle    = 0;
$color    = 0x000000;
$fontfile = '/path/to/font.ttf'; // Edit accordingly
$text     = $_GET['text']; // Or any other source

// Print-centered text
list($x, $y) = ImageFTCenter($image, $size, $angle, $fontfile, $text);
ImageFTText($image, $size, $angle, $x, $y, $color, $fontfile, $text);

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
