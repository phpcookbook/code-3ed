<?php
$thumb = exif_thumbnail('beth-and-seth.jpeg', $width, $height, $type);

if ($thumb !== false) {
    $mime = image_type_to_mime_type($type);
    header("Content-type: $mime");
    print $thumb;
} else {
    print "Sorry. No thumbnail.";
}
