<?php
// open a PNG from the local machine
$graph = ImageCreateFromPNG('/path/to/graph.png');

// open a JPEG from a remote server
$icon  = ImageCreateFromJPEG('http://www.example.com/images/icon.jpeg');
