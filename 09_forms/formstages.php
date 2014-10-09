<?php
// Turn on sessions
session_start();

// Figure out what stage to use
if (($_SERVER['REQUEST_METHOD'] == 'GET') || (! isset($_POST['stage']))) {
    $stage = 1;
} else {
    $stage = (int) $_POST['stage'];
}

// Make sure stage isn't too big or too small
$stage = max($stage, 1);
$stage = min($stage, 3);

// Save any submitted data
if ($stage > 1) {
    foreach ($_POST as $key => $value) {
        $_SESSION[$key] = $value;
    }
}

include __DIR__ . "/stage-$stage.php";
