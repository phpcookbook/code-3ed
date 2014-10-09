<?php
// this is OK
(12 == $status) ? print 'Status is good' : error_log('Problem with status!');

// this gives a parse error
(12 == $status) ? echo 'Status is good' : error_log('Problem with status!');
