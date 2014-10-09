<?php
function get_file($filename) { return file_get_contents($filename); }

$function = 'get_file';
$filename = 'graphic.png';

// calls get_file('graphic.png')
call_user_func($function, $filename);
