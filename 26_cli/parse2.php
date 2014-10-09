<?php
for ($i = 1; $i < $argc; $i++) {
    switch ($argv[$i]) {
    case '-v':
        // set a flag
        $verbose = true;
        break;
    case '-c':
        // advance to the next argument
        $i++;
        // if it's set, save the value
        if (isset($argv[$i])) {
            $config_file = $argv[$i];
        } else {
            // quit if no filename specified
            die("Must specify a filename after -c");
        }
        break;
    case '-q':
        $quiet = true;
        break;
    default:
        die('Unknown argument: '.$argv[$i]);
        break;
    }
}