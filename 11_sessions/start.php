<?php
session_start();
if (! isset($_SESSION['visits'])) {
    $_SESSION['visits'] = 0;
}
$_SESSION['visits']++;
print 'You have visited here '.$_SESSION['visits'].' times.';
