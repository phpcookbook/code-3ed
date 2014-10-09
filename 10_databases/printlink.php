<?php
function print_link($inactive,$text,$offset='') {
    if ($inactive) {
        print "<span class='inactive'>$text</span>";
    } else {
        print "<span class='active'>".
              "<a href='" . htmlentities($_SERVER['PHP_SELF']) .
              "?offset=$offset'>$text</a></span>";
    }
}
