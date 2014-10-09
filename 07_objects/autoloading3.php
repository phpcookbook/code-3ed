<?php
function __autoload($package_name) {
    // divide on underscore  
    $folders = explode('_', $package_name);
    // rejoin based on directory structure
    // use DIRECTORY_SEPARATOR constant to work on all platforms
    $path    = implode(DIRECTORY_SEPARATOR, $folders);
    // append extension
    $path   .= '.php';
   
    include $path;
}
