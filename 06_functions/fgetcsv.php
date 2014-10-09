<?php
while ($fields = fgetcsv($fh, 4096)) {
    print $fields[2] . "\n";  // the third field
}
