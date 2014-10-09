<?php
if (! checkdate($_POST['month'], $_POST['day'], $_POST['year'])) {
   print "The date you entered doesn't exist!";
}
