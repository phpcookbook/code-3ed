<?php
$image = ImageCreateTrueColor(200, 50); // defaults to black

// color the background grey
$grey = 0xCCCCCC;
ImageFilledRectangle($image, 0, 0, 200 - 1, 50 - 1, $grey);

// draw a white rectangle on top
$white = 0xFFFFFF;
ImageFilledRectangle($image, 50, 10, 150, 40, $white);

// send it as PNG
header('Content-type: image/png');
ImagePNG($image);
ImageDestroy($image);
