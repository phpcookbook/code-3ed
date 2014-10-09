<?php
$url = 'http://www.example.com/meals/123';
$header = "Content-Type: application/json";
// The request body, in JSON
$body = '[{
    "type": "appetizer",
    "dish": "Chicken Soup"
}, {
    "type": "main course",
    "dish": "Fried Monkey Brains"
}]';

$options = array('method' => 'put', 
    'header' => $header, 
    'content' => $body);
// Create the stream context
$context = stream_context_create(array('http' => $options));
// Pass the context to file_get_contents()
print file_get_contents($url, false, $context);