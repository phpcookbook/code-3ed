<?php
$image = ImageCreateTrueColor(200, 50);

$background_color = 0xFFFFFF; // white
ImageFilledRectangle($image, 0, 0, 200 - 1, 50 - 1, $background_color); 

$x1 = $y1 = 0 ; // 0
$x2 = $y2 = 49; // 50 - 1
$color = 0xCCCCCC; // gray

ImageLine($image, $x1, $y1, $x2, $y2, $color);

header('Content-type: image/png');
ImagePNG($image);
ImageDestroy($image);