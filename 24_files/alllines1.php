<?php
$lines = file(__DIR__ . '/quotes-of-the-day.txt');

if (shuffle($lines)) {
    // okay
} else {
    die("Failed to shuffle");
}
