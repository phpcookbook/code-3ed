<?php

$current_user = 'ralph';
include __DIR__ . '/apc-add.php';

$current_user = 'harry';
include __DIR__ . '/apc-add.php';


$u = apc_fetch('recent-users');
