<?php
while (list(,,$rank,,) = fgetcsv($fh, 4096)) {
    print "$rank\n";         // directly assign $rank
}
