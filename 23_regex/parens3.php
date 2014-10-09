<?php
$html = '<link rel="icon" href="http://www.example.com/icon.gif"/>
<link rel="prev" title="Previous" href="http://www.example.com/prev.xml"/>
<link rel="next" href="http://www.example.com/next.xml"/>';

preg_match_all('/rel="(?:prev|next)"(?: title="[^"]+?")? href="([^"]*?)"/', $html, $linkMatches);

print '$bothMatches is: '; var_dump($linkMatches);
