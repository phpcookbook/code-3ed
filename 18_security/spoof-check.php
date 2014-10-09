<?php

session_start();

if ($_POST['token'] != $_SESSION['token'] ||
    !isset($_SESSION['token'])) {
    /* Prompt user for password. */
} else {
    /* Continue. */
}
