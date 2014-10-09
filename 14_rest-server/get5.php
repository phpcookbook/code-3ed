<?php
// Resource exists 200: OK
http_response_code(200);

// And it's being sent back as JSON
header('Content-Type: text/json');
