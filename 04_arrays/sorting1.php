<?php
class Dates {
    public function compare($a, $b) { /* compare here */ }
}

$dates = new Dates;

usort($access_times, array($dates, 'compare'));
