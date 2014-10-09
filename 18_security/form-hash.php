<?php

/* Define a salt. */
define('SALT', 'flyingturtle');

$id = 1337;
$idcheck = hash_hmac('sha1', $id, SALT);

?>
<input type="hidden" name="id" value="<?php echo $id; ?>" />
<input type="hidden" name="idcheck" value="<?php echo $idcheck; ?>" />