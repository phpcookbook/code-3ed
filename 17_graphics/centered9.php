<?php
    // find the size of the text 
    list($xl, $yl, $xr, $yr) = ImagePSBBox($text, $font, $size,
                                     $space, $tightness, $angle);
