<?php
$text = "The files are cuddly.gif, report.pdf, and cute.jpg.";
if (preg_match_all('/[a-zA-Z0-9]+\.(gif|jpe?g)/',$text,$matches)) {
    print "The image files are: " . implode(',',$matches[0]);
}
