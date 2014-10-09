<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    include __DIR__ . '/getpost-get.php';
}
else {
    include __DIR__ . '/getpost-post.php';
}