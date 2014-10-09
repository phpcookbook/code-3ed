<?php
$color = ImageAllocate($image, $r, $g, $b);

// For example, white
$white = ImageAllocate($image, 0xFF, 0xFF, 0xFF); // hex
$white = ImageAllocate($image,  255,  255,  255); // decimal

// Or...
$grey = ImageColorAllocate($image, 204, 204, 204);
$orange = ImageColorAllocate($image, 0xE9, 0x52, 0x22);
