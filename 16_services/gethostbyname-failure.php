<?php
$host = 'this is not a good host name!';
if ($host == ($ip = gethostbyname($host))) {
    // failure
}
