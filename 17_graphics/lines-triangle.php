<?php
$size = 50;
$image = ImageCreateTrueColor($size, $size);

$background_color = 0xFFFFFF // white
ImageFilledRectangle($image, 0, 0, $size - 1, $size - 1, $background_color);

// three points for right triangle
$x1 = $y1 = 0 ;           // ( 0, 0)
$x2 = $y2 = $size - 1;    // (49,49)
$x3 = 0; $y3 = $size - 1; // ( 0,49)

$gray = 0xCCCCCC; // gray

$points = array($x1, $y1, $x2, $y2, $x3, $y3);
ImagePolygon($image, $points, count($points)/2, $gray);

header('Content-type: image/png');
ImagePNG($image);
ImageDestroy($image);