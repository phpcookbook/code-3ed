<?php
$url = 'http://www.example.com/submit.php';
// The submitted form data, encoded as query-string-style
// name-value pairs
$body = 'monkey=uncle&rhino=aunt';
$options = array('method' => 'POST', 
                 'content' => $body, 
                 'header' => 'Content-type: application/x-www-form-urlencoded');
// Create the stream context
$context = stream_context_create(array('http' => $options));
// Pass the context to file_get_contents()
print file_get_contents($url, false, $context);

