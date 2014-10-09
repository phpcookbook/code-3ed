<?php
$w = 400; $h = 150;
$image = ImageCreateTrueColor($w, $h);
ImageFilledRectangle($image, 0, 0, $w, $h, 0xFFFFFF);

$x = $y = 10;
$text = 'Pack my box with five dozen liquor jugs.';
for ($i = 1; $i <= 5; $i++ ) {
    ImageString($image, $i, $x, $y, $text, 0);
    $y += 14 + (1.1 * $i);
}

header('Content-type: image/png');
ImagePNG($image);
ImageDestroy($image);
