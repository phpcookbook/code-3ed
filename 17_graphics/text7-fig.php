<?php
$w = 400; $h = 200;
$image = ImageCreateTrueColor($w, $h);
ImageFilledRectangle($image, 0, 0, $w, $h, 0xFFFFFF);

$x = 10;
$y = 190;
$i = 5;
$black = 0;
$white = 0xfff;
$size = 18;
//$font = ImagePSLoadFont(__DIR__ . '/odstemplik/odstemplik.otf');
$font = ImagePSLoadFont('Times');


$text = 'Pack my box with five dozen liquor jugs.';

// normal image
ImagePSText($image, $text, $font, $size, $black, $white, $x, $y,
            0, 0, 0, 4);

// extra space between words
ImagePSText($image, $text, $font, $size, $black, $white, $x, $y + 30, 
            100, 0, 0, 4);

// extra space between letters
ImagePSText($image, $text, $font, $size, $black, $white, $x, $y + 60, 
            0, 100, 0, 4);
