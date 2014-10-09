<?php
// make a two-pixel thick black and white dashed line
$black = 0x000000;
$white = 0xFFFFFF;

$style = array($black, $black, $white, $white);
ImageSetStyle($image, $style);

ImageLine($image, 0, 0, 50, 50, IMG_COLOR_STYLED);
ImageFilledRectangle($image, 50, 50, 100, 100, IMG_COLOR_STYLED);
