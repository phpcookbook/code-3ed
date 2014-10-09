<?php
$file = 'beth-and-seth.jpeg';
$thumb = exif_thumbnail($file, $width, $height, $type);

if ($thumb !== false) {
    $img = "<img src=\"$file\" alt=\"Beth and Seth\"
                 width=\"$width\" height=\"$height\">";
    print $img;
}
