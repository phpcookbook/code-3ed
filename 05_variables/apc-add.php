<?php

function update_recent_users($current_user) {
    $recent_users = apc_fetch('recent-users', $success);
    if ($success) {
        if (! in_array($current_user, $recent_users)) {
            array_unshift($recent_users, $current_user);
        }
    }
    else {
        $recent_users = array($current_user);
    }
    $recent_users = array_slice($recent_users, 0, 10);
    apc_store('recent-users', $recent_users);
}

$tries = 3;
$done = false;

while ((! $done) && ($tries-- > 0)) {
    if (apc_add('my-lock', true, 5)) {
        update_recent_users($current_user);
        apc_delete('my-lock');
        $done = true;
    }
}
