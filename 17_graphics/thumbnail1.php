<?php
$filename = __DIR__ . '/php.png';
$scale = 0.5; // Scale

// Images
$image = ImageCreateFromPNG($filename);
$thumbnail = ImageCreateTrueColor(
    ImageSX($image) * $scale,
    ImageSY($image) * $scale);        

// Preserve Transparency
ImageColorTransparent($thumbnail, 
    ImageColorAllocateAlpha($thumbnail, 0, 0, 0, 127));
ImageAlphaBlending($thumbnail, false);
ImageSaveAlpha($thumbnail, true);

// Scale & Copy
ImageCopyResampled($thumbnail, $image, 0, 0, 0, 0, 
    ImageSX($thumbnail), ImageSY($thumbnail), 
    ImageSX($image), ImageSY($image));

// Send
header('Content-type: image/png');
ImagePNG($thumbnail);
ImageDestroy($image);
ImageDestroy($thumbnail);
