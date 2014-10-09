<?php
$r = mysql_query($sql);
if (! $r) {
    error_log("bad query");
} else {
    // process result
}
