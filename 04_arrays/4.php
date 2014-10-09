<?php
while ($row = mysqli_fetch_assoc($r)) {
    $fruits[] = $row;
}

while ($obj = mysqli_fetch_object($s)) {
    $vegetables[] = $obj;
}
