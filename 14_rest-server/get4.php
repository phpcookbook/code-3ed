<?php
// Assume this was pulled from a database or other data store
$job[123] = [
    'id' => 123,
    'position' => [
        'title' => 'PHP Developer',
        ],
    ];

$json = json_encode($job[123]);
