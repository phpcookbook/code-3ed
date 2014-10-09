<?php
$method = strtolower($_SERVER['REQUEST_METHOD']);
switch($method) {
    case 'get':
        // handle a GET request
        get_book($request);
        break;
    case 'post':
        // handle a POST request
        post_book($request);
        break;
    case 'put':
        // handle a PUT request
        put_book($request);
        break;
    case 'delete':
        // handle a DELETE request
        delete_book($request);
        break;
    default:
        // unimplemented method
        http_response_code(405);
}
