<?php
// Shucks, you failed the test!
apc_store('passed the test?', false);

// $results is false, because the stored value was false
// $success is true, because the call to apc_fetch() succeeded
$results = apc_fetch('passed the test?', $success);
