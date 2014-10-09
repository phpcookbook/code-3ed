<?php
// Assume this was pulled from a database or other data store
$job[123] = [
    'id' => 123,
    'position' => [
        'title' => 'PHP Developer',
        ],
    ];

$json = json_encode($job[123]);

// Resource exists 200: OK
http_response_code(200);

// And it's being sent back as JSON
header('Content-Type: application/json');

print $json;
