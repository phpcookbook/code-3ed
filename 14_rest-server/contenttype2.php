<?php
// Break apart URL
$request = explode('/', $_SERVER['PATH_INFO']);

// Extract the root resource and type
$resource = array_shift($request);
$file = array_pop($request);
$dot = strrpos($file, ".");
if ($dot === false) { // note: three equal signs
    $request[] = $file;
    $type = 'json'; // default value
} else {
    $request[] = substr($file, 0, $dot);
    $type = substr($file, $dot + 1);
}
