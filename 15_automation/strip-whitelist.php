<?php

$html=<<<_HTML_
<a href=foo onmouseover="bad()" >this is some</b>
stuff
    <p>This should be OK, as <a href="beep">well</a> as this. </p>
<script>alert('whoops')<p>This gets removed.</p></script>

<p>But this <script>bad</script> stuff has the script removed.</p>
_HTML_;


$ts = new TagStripper();
print $ts->strip($html);
