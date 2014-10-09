<?php
// make a five-pixel thick black and white dashed line
$style = array($white, $white, $white, $white, $white, 
               $black, $black, $black, $black, $black);
ImageSetStyle($image, $style);
ImageFilledRectangle($image, 0, 0, 49, 49, IMG_COLOR_STYLED);
