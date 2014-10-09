<?php
if ($_SERVER["REQUEST_METHOD"] == 'POST') {

    $body = file_get_contents('php://input');
    switch(strtolower($_SERVER['CONTENT_TYPE'])) {
        case "application/json":
            $job = json_decode($body);
            break;
        case "text/xml":
            $job = simplexml_load_string($body);
            break;
    }

    // Validate input

    // Create new Resource
    $id = create($job); // Returns id
}