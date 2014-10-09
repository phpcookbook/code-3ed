<?php
// Scale & Copy
$x = ImageSX($original);
$y = ImageSY($original);
$scale = min($x / $w, $y / $h);

ImageCopyResampled($thumbnail, $original,
    0, 0, ($x - ($w * $scale)) / 2, ($y - ($h * $scale)) / 2, 
    $w, $h, $w * $scale, $h * $scale);

