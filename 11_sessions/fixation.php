<?php
ini_set('session.use_only_cookies', true);
session_start();
if (!isset($_SESSION['generated']) 
    || $_SESSION['generated'] < (time() - 30)) {
    session_regenerate_id();
    $_SESSION['generated'] = time();
}
