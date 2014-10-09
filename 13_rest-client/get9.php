<?php
$url = 'http://www.example.com/redirector.php';
// Define the options
$options = array('max_redirects' => 1 );
// Create a context with options for the http stream
$context = stream_context_create(array('http' => $options));
// Pass the options to file_get_contents. The second
// argument is whether to use the include path, which
// we don't want here.
print file_get_contents($url, false, $context);
