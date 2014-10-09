<?php
if (isset($_GET['button'])) {

    // Configuration settings
    $image    = ImageCreateFromPNG(__DIR__ . '/button.png');
    $text     = $_GET['button']; // dynamically generated text
    $font     = '/Library/Fonts/Hei.ttf';
    $size     = 24;
    $color    = 0x000000;
    $angle    = 0;

    // Print-centered text
    list($x, $y) = ImageFTCenter($image, $size, $angle, $font, $text);
    ImageFTText($image, $size, $angle, $x, $y, $color, $font, $text);

    // Preserve Transparency
    ImageColorTransparent($image, 
        ImageColorAllocateAlpha($image, 0, 0, 0, 127));
    ImageAlphaBlending($image, false);
    ImageSaveAlpha($image, true);

    // Send image
    header('Content-type: image/png');
    ImagePNG($image);

    // Clean up
    ImagePSFreeFont($font);
    ImageDestroy($image);
    

} else {
    $url = htmlentities($_SERVER['PHP_SELF']);
?>
<html>
<head>
    <title>Sample Button Page</title>
</head>
<body>
    <img src="<?php echo $url; ?>?button=Previous" 
         alt="Previous" width="132" height="46">
    <img src="<?php echo $url; ?>?button=Next" 
         alt="Next"     width="132" height="46">
</body>
</html>
<?php
}
?>
