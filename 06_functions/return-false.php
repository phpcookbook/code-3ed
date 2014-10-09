<?php
function lookup($name) {
    if (empty($name)) { return false; }
    /* ... */
}

$name = 'alice';

if (false !== lookup($name)) {
    /* act upon lookup */
} else {
    /* log an error */
}
