<?php
$html = 'The &lt;b&gt; tag makes text bold: <code>&lt;b&gt;bold&lt;/b&gt;</code>';
print preg_replace_callback('@<code>(.*?)</code>@','decode', $html);

// $matches[0] is the entire matched string
// $matches[1] is the first captured subpattern
function decode($matches) {
    return html_entity_decode($matches[1]);
}
