<?php
$html = "<a href='fletch.html'>Stew's favorite movie.</a>\n";
print htmlspecialchars($html);                // double-quotes
print htmlspecialchars($html, ENT_QUOTES);    // single- and double-quotes
print htmlspecialchars($html, ENT_NOQUOTES);  // neither
