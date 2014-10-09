<?php
$w = 400; $h = 200;
$image = ImageCreateTrueColor($w, $h);
ImageFilledRectangle($image, 0, 0, $w, $h, 0xFFFFFF);

$x = 10;
$y = 190;
$i = 5;
$text = 'I love PHP Cookbook!';
ImageStringUp($image, $i, $x, $y, $text, 0);

header('Content-type: image/png');
ImagePNG($image);
ImageDestroy($image);
