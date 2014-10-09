<?php

function grid_horizontal($array, $size) {

    // compute <td> width %ages
    $table_width = 100;
    $width = intval($table_width / $size);

    // define how our <tr> and <td> tags appear
    // sprintf() requires us to use %% to get literal %
    $tr = '<tr align="center">';
    $td = "<td width=\"$width%%\">%s</td>";

    // open table
    $grid = "<table width=\"$table_width%%\">$tr";

    // loop through entries and display in rows of size $sized
    // $i keeps track of when we need a new table tow
    $i = 0;
    foreach ($array as $e) {
        $grid .= sprintf($td, $e);
        $i++;

        // end of a row
        // close it up and open a new one
        if (!($i % $size)) {
            $grid .= "</tr>$tr";
        }
    }

    // pad out remaining cells with blanks
    while ($i % $size) {
        $grid .= sprintf($td, '&nbsp;');
        $i++;
    }

    // add </tr>, if necessary
    $end_tr_len = strlen($tr) * -1;
    if (substr($grid, $end_tr_len) != $tr) {
        $grid .= '</tr>';
    } else {
        $grid = substr($grid, 0, $end_tr_len);
    }

    // close table
    $grid .= '</table>';

    return $grid;
}
