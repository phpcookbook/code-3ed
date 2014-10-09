<?php
$size = 100;
$scale = 2.5;
$image = ImageCreateTrueColor($size * $scale, $size);

$background_color = 0xFFFFFF; // white
ImageFilledRectangle($image, 0, 0, $size * $scale - 1, $size * $scale - 1, $background_color);

$black = 0x000000;
ImageEllipse($image, $size / 2, $size / 2, $size - 1, $size - 1, $black);
ImageFilledEllipse($image, $size / 2 + ($scale - 1) * $size, $size / 2, $size - 1, $size - 1, $black);

header('Content-type: image/png');
ImagePNG($image);
ImageDestroy($image);