<?php
require 'HTTP/Request2.php';
$url = 'http://www.example.com/meals/123';
// The request body, in JSON
$body = '[{
    "type": "appetizer",
    "dish": "Chicken Soup"
}, {
    "type": "main course",
    "dish": "Fried Monkey Brains"
}]';
$r = new HTTP_Request2($url);
$r->setMethod(HTTP_Request2::METHOD_PUT);
$r->setHeader('Content-Type', 'application/json');
$r->setBody($body);

$page = $r->send()->getBody();