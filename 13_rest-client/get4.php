<?php
$url = 'http://rss.news.yahoo.com/rss/oddlyenough';
$rss = simplexml_load_file($url);
print '<ul>';
foreach ($rss->channel->item as $item) {
   print '<li><a href="' .
         htmlentities($item->link) .
         '">' .
         htmlentities($item->title) .
         '</a></li>';
}
print '</ul>';