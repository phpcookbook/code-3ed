<?php

$bits = array();

$bits['Hour'] = array('a' => 'Ante/Post Meridiem designation',
           'h' =>  'Hour, 12-hour clock (1 - 12)',
           'K' =>  'Hour, 12-hour clock (0 - 11)',
           'H' =>  'Hour, 24-hour clock (0 - 23)',
            'k' =>  'Hour, 24-hour clock (1 - 24)');
$bits['Minute'] = array('m' => 'Minute (0 - 59)');
$bits['Second'] = array('s' => 'Second (0 - 59)',
             'S' => 'Decisecond (0 - 9)',
             'SS' => 'Centisecond (00 - 99)',
             'SSS' => 'Millisecond (000 - 999)',
             'A' => 'Milliseconds in day');
$bits['Day']= array('d' => 'Day of month (1 - 31)',
             'D' => 'Day of year (1 - 366)',
             'EEEEE' => 'Day of week, short abbreviation',
             'EEE' => 'Day of week, long abbreviation',
             'EEEE' => 'Day of week, name',
             'e' => 'Day of week, number (0 or 1 to 6 or 7, localized)',
             'F' => 'Day of week in the month (e.g. 3 for "third wednesday")',
             'g' => 'Modified Julian Day');
$bits['Week'] = array('w' => 'Week of Year, with localized week start (1 - 52)',
               'W' => 'Week of Month (1 - 5)');
$bits['Month'] = array('M' => 'Month (1 - 12)',
                'MMMMM' => 'Month, short abbreviation',
                'MMM' => 'Month, long abbreviation',
                'MMMM' => 'Month, name');
$bits['Year'] = array('y' => 'Year, 4-digit',
               'yy' => 'Year, 2-digit');
$bits['Time Zone'] = array('z' => 'Time zone, including Summer Time, abbreviated',
            'zzzz' => 'Time zone, including Summer Time, full name',
            'Z' => 'Time zone, RFC-822 format',
            'ZZZZ' => 'Time zone, as GMT offset',
            'ZZZZZ' => 'Time zone, ISO-8601 format',
            'v' => 'Time zone, not including Summer Time, abbreviated',
            'vvvv' => 'Time zone, not including Summer Time, full name',
            'VVVV' => 'Time zone, as location');
$bits['Other'] = array('Q' => 'Quarter, number',
               'QQQ' => 'Quarter, number with prefix',
               'QQQQ' => 'Quarter, as words',
               'G' => 'Era (BC, AD)',
               "''" => 'Single quote');


/*
standalone
c for e
q for Q
L for M
*/

$when = new DateTime('2004-03-18T15:08:07 America/New_York');

print "|Type|Character|Description|Example\n";
foreach ($bits as $type => $stuff) {
    foreach ($stuff as $char => $desc) {
        $example = IntlDateFormatter::formatObject($when, $char, 'en_US');
        print "|$type|$char|$desc|$example\n";
    }
}