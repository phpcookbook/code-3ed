<?php
$size = 50;
$image = ImageCreateTrueColor($size, $size);

$background_color = ImageColorAllocate($image, 255, 255, 255); // white
ImageFilledRectangle($image, 0, 0, $size - 1, $size - 1, $background_color);

$gray             = ImageColorAllocate($image, 204, 204, 204); // gray

$x1 = $y1 = 0 ; // 0
$x2 = $y2 = $size - 1; // 49
$x3 = 0; $y3 = $size - 1; // 49

$color = $gray;
$color = IMG_COLOR_STYLED;

//ImageLine($image, $x1, $y1, $x2, $y2, $color);

//ImageRectangle($image, $x1, $y1, $x2, $y2, $color);

$points = array($x1, $y1, $x2, $y2, $x3, $y3);
ImagePolygon($image, $points, count($points)/2, $color);

header('Content-type: image/png');
ImagePNG($image);
ImageDestroy($image);