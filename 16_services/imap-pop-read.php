<?php
// open IMAP connection
$mail = imap_open('{mail.server.com:143}',      'username', 'password');
// or, open POP3 connection
$mail = imap_open('{mail.server.com:110/pop3}', 'username', 'password');

// grab a list of all the mail headers
$headers = imap_headers($mail);

// grab a header object for the last message in the mailbox
$last = imap_num_msg($mail);
$header = imap_header($mail, $last);

// grab the body for the same message
$body = imap_body($mail, $last);

// close the connection
imap_close($mail);
