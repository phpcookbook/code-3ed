<?php
if ($_SERVER["REQUEST_METHOD"] == 'DELETE') {
    // Delete the Resource
    $success = delete($id);

    http_response_code(204); // No Content
}
