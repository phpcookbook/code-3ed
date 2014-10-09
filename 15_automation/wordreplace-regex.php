<?php
$body = '
<p>I like pickles and herring.</p>

<a href="pickle.php"><img src="pickle.jpg"/>A pickle picture</a>

I have a herringbone-patterned toaster cozy.

<herring>Herring is not a real HTML element!</herring>
';

$words = array('pickle','herring');
$patterns = array();
$replacements = array();
foreach ($words as $i => $word) {
    $patterns[] = '/' . preg_quote($word) .'/i';
    $replacements[] = "<span class='word-$i'>\\0</span>";
}

// Split up the page into chunks delimited by a
// reasonable approximation of what an HTML element
// looks like.
$parts = preg_split("{(<(?:\"[^\"]*\"|'[^']*'|[^'\">])*>)}",
                    $body,
                    -1,  // Unlimited number of chunks
                    PREG_SPLIT_DELIM_CAPTURE);
foreach ($parts as $i => $part) {
    // Skip if this part is an HTML element
    if (isset($part[0]) && ($part[0] == '<')) { continue; }
    // Wrap the words with <span/>s
    $parts[$i] = preg_replace($patterns, $replacements, $part);
}

// Reconstruct the body
$body = implode('',$parts);

print $body;
