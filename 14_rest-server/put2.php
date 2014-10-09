<?php
if ($_SERVER["REQUEST_METHOD"] == 'PUT') {
    $body = file_get_contents('php://input');
    switch(strtolower($_SERVER['CONTENT_TYPE'])) {
        case "application/json":
            $job = json_decode($body);
            break;
        case "text/xml":
            // parsing here
            break;
    }

    // Validate input

    // Modify the Resource
    $id = update($job); // Returns id

    http_response_code(204); // No Content
}
