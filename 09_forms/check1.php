<?php
// Generating the checkbox
$value = 'yes';
echo "<input type='checkbox' name='subscribe' value='yes'/> Subscribe?";

// Then, later, validating the checkbox
if (filter_has_var(INPUT_POST, 'subscribe')) {
    // A value was submitted and it's the right one
    if ($_POST['subscribe'] == $value) {
        $subscribed = true;
    } else {
        // A value was submitted and it's the wrong one
        $subscribed = false;
        print 'Invalid checkbox value submitted.';
    }
} else {
    // No value was submitted
    $subscribed = false;
}

if ($subscribed) {
    print 'You are subscribed.';
} else {
    print 'You are not subscribed';
}
