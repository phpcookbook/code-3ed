<?php
$styles = [1, 2];

$size = 50;
$image = ImageCreateTrueColor($size * count($styles) + 25, $size);

$background_color = ImageColorAllocate($image, 255, 255, 255); // white
ImageFilledRectangle($image, 0, 0, 
    $size * count($styles) - 1 + 25, $size * count($styles) - 1, $background_color);

$black = ImageColorAllocate($image, 0, 0, 0);

$white = ImageColorAllocate($image, 255, 255, 255);

// make a two-pixel thick black and white dashed line
$style = array($black, $black, $white, $white);
ImageSetStyle($image, $style);
ImageFilledRectangle($image, 0, 0, 49, 49, IMG_COLOR_STYLED);

$style = array($white, $white, $white, $white, $white, 
               $black, $black, $black, $black, $black);
ImageSetStyle($image, $style);

ImageFilledRectangle($image, 75, 0, 124, 49, IMG_COLOR_STYLED);


header('Content-type: image/png');
ImagePNG($image);
ImageDestroy($image);

