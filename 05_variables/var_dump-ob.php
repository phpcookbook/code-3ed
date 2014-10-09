<?php
ob_start();
var_dump($user);
$dump = ob_get_contents();
ob_end_clean();
