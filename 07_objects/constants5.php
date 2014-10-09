<?php
// invalid
class permissions {
    const    read = 1 << 2;
    const   write = 1 << 1;
    const execute = 1 << 0;
}

// invalid and insecure
class database {
    const debug = $_REQUEST['debug'];
}
