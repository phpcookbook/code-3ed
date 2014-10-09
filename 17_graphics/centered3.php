<?php
function pc_ImagePSCenter($image, $text, $font, $size, $space = 0,
                           $tightness = 0, $angle = 0) {

    // find the size of the image
    $xi = ImageSX($image);
    $yi = ImageSY($image);

    // find the size of the text
    list($xl, $yl, $xr, $yr) = ImagePSBBox($text, $font, $size,
                                     $space, $tightness, $angle);

    // compute centering
    $x = intval(($xi - $xr) / 2);
    $y = intval(($yi + $yr) / 2);

    return array($x, $y);
}
