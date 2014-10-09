<?php
$image = ImageCreateFromPNG('/path/to/image.png');
$stamp = ImageCreateFromPNG('/path/to/stamp.png');

$margin = ['right' => 10, 'bottom' => 10]; // offset from the edge
$opacity = 50; // between 0 and 100%

ImageCopyMerge($image, $stamp, 
    imagesx($image) - imagesx($stamp) - $margin['right'], 
    imagesy($image) - imagesy($stamp) - $margin['bottom'], 
    0, 0, imagesx($stamp), imagesy($stamp), 
    $opacity);
