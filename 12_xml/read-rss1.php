<?php
require __DIR__ . '/magpie/rss_fetch.inc';

$feed = 'http://news.php.net/group.php?group=php.announce&format=rss';

$rss = fetch_rss( $feed );

print "<ul>\n";
foreach ($rss->items as $item) {
    print '<li><a href="' . $item['link'] . '">' . $item['title'] . "</a></li>\n";
}
print "</ul>\n";
