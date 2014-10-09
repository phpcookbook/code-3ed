<?php
if ($argc < 2) {
    print "$argv[0]: function/method, classes1.php [, ... classesN.php]\n";
    exit;
}

// Grab the function name
$function = $argv[1];

// Include the files
foreach (array_slice($argv, 2) as $filename) {
    include_once $filename;
}

try {
    if (strpos($function, '::')) {
        // It's a method
        list ($class, $method) = explode('::', $function);
        $reflect = new ReflectionMethod($class, $method);
    } else {
        // It's a function
        $reflect = new ReflectionFunction($function);
    }

    $file = $reflect->getFileName();
    $line = $reflect->getStartLine();
     
    printf ("%s | %s | %d\n", "$function()", $file, $line);
} catch (ReflectionException $e) {
    printf ("%s not found.\n", "$function()");
}
