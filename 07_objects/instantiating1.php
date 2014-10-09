<?php
class user {
    function load_info($username) {
       // load profile from database
    }
}

$user = new user;
$user->load_info($_GET['username']);
