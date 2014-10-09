<?php
function track_times_called() {
    static $i = 0;
    $i++;
    return $i;
}
