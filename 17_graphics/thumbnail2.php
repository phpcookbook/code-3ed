<?php
// Square version

$filename = __DIR__ . '/php.png';
// Thumbnail Length
$length = 25;

// Images
$original = ImageCreateFromPNG($filename);
$thumbnail = ImageCreateTrueColor($length, $length);

// Preserve Transparency
ImageColorTransparent($thumbnail, 
    ImageColorAllocateAlpha($thumbnail, 0, 0, 0, 127));
ImageAlphaBlending($thumbnail, false);
ImageSaveAlpha($thumbnail, true);

// Scale & Copy
$x = ImageSX($original);
$y = ImageSY($original);
$min = min($x, $y);

ImageCopyResampled($thumbnail, $original,
    0, 0, ($x - $min) / 2, ($y - $min) / 2, 
    $length, $length, $min, $min);

// Send
header('Content-type: image/png');
ImagePNG($thumbnail);
ImageDestroy($original);
ImageDestroy($thumbnail);
