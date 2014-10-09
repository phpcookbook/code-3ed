<?php
// Scale & Copy
ImageCopyResampled($thumbnail, $image, 0, 0, 0, 0, 
    ImageSX($thumbnail), ImageSY($thumbnail), 
    ImageSX($image), ImageSY($image));

