<?php
function indexed_links($total,$offset,$per_page) {
    $separator = ' | ';

    // print "<<Prev" link
    print_link($offset == 1, '<< Prev', max(1, $offset - $per_page));

    // print all groupings except last one
    for ($start = 1, $end = $per_page;
         $end < $total;
         $start += $per_page, $end += $per_page) {
             print $separator;
             print_link($offset == $start, "$start-$end", $start);
    }

    /* print the last grouping -
     * at this point, $start points to the element at the beginning
     * of the last grouping
     */

    /* the text should only contain a range if there's more than
     * one element on the last page. For example, the last grouping
     * of 11 elements with 5 per page should just say "11", not "11-11"
     */
    $end = ($total > $start) ? "-$total" : '';

    print $separator;
    print_link($offset == $start, "$start$end", $start);

    // print "Next>>" link
    print $separator;
    print_link($offset == $start, 'Next >>',$offset + $per_page);
}
