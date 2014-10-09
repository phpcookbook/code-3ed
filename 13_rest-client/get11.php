<?php
require 'HTTP/Request2.php';

$r = new HTTP_Request2('http://www.example.com/redirector.php');
$r->setConfig(array(
    'follow_redirects' => true,
    'max_redirects'    => 1
));

$page = $r->send()->getBody();
print $page;