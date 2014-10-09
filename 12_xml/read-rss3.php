<?php
print "<ul>\n";

foreach ($rss->items as $item) {
    print '<li><a href="' . $item['link'] . '">' . $item['title'] . "</a></li>\n";
}

print "</ul>\n";
?>
