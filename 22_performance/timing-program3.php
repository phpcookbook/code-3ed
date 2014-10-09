<?php
function profile($display = false) {
    static $times;

    switch ($display) {
    case false:
        // add the current time to the list of recorded times
        $times[] = microtime();
        break;
    case true:
        // return elapsed times in microseconds
        $start = array_shift($times);

        $start_mt = explode(' ', $start); 
        $start_total = doubleval($start_mt[0]) + $start_mt[1]; 

        foreach ($times as $stop) { 
            $stop_mt = explode(' ', $stop); 
            $stop_total = doubleval($stop_mt[0]) + $stop_mt[1]; 
            $elapsed[] = $stop_total - $start_total; 
        }

        unset($times);
        return $elapsed;
        break;
    }
}

// register tick handler
register_tick_function('profile');

// clock the start time
profile();

// execute code, recording time for every statement execution
declare (ticks = 1) { 
    foreach ($_SERVER['argv'] as $arg) {
        print "$arg: " . strlen($arg) ."\n";
    }
}

// print out elapsed times
print "---\n";
$i = 0;
foreach (profile(true) as $time) {
    $i++;
    print "Line $i: $time\n";
}
