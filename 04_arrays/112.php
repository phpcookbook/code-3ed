<?php
// establish connection to database
$dsn = 'mysql://user:password@localhost/table';
$dbh = DB::connect($dsn);
if (DB::isError($dbh)) { die ($dbh->getMessage()); }

// query the database for the 50 states
$sql = "SELECT state FROM states";
$sth = $dbh->query($sql);

// load data into array from database
while ($row = $sth->fetchRow(DB_FETCHMODE_ASSOC)) {
  $states[] = $row['state'];
}

// generate the HTML table
$grid = grid_horizontal($states, 6);

// and print it out
print $grid;
