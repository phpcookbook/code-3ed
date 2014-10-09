<?php

$html = '<a href="http://www.oreilly.com">I <b>love computer books.</b></a>';
$html .= '<?php echo "Hello!" ?>';
print strip_tags($html);
print "\n";
print filter_var($html, FILTER_SANITIZE_STRING);
