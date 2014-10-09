<?php
    // find the size of the text 
    $box = ImageFTBBox($size, $angle, $font, $text);

    $xr = abs(max($box[2], $box[4]));
    $yr = abs(max($box[5], $box[7]));
