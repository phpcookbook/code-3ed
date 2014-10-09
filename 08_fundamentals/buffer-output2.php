<?php 
function mangle_email($s) {
    return preg_replace('/([^@\s]+)@([-a-z0-9]+\.)+[a-z]{2,}/is',
                        '<$1@...>',
                        $s);
}

ob_start('mangle_email'); 
?>

I would not like spam sent to ronald@example.com!

<?php 
ob_end_flush();

