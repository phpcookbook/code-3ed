<?php
/* Set an SSL-only cookie named "sslonly" with value "yes" that expires at the
   end of the current browser session. */
if ('on' === $_SERVER['HTTPS']) {
    setcookie('sslonly', 'yes', 0, '/', 'example.org', true);
}
