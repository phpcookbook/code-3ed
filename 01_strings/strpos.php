<?php

if (strpos($_POST['email'], '@') === false) {
    print 'There was no @ in the e-mail address!';
 }

