<?php
function validate_date($user,$pass) {
    $db = new PDO('sqlite:/databases/users');

    // Prepare and execute
    $st = $db->prepare('SELECT password, last_access
                        FROM users WHERE user LIKE ?');
    $st->execute(array($user));

    if ($ob = $st->fetchObject()) {
        if ($ob->password == $pass) {
            $now = time();
            if (($now - $ob->last_access) > (15 * 60)) {
                return false;
            } else {
                // update the last access time
                $st2 = $db->prepare('UPDATE users SET last_access = "now" 
-                                    WHERE user LIKE ?');
                
                $st2->execute(array($user));
                return true;
            }
        }
    }
    
    return false;
}
