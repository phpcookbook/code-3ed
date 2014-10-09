<?php
$font = ImagePSLoadFont('/path/to/font.pfb');
ImagePSText($image, 'I love PHP Cookbook', $font, $size, 
            $text_color, $background_color, $x, $y);
