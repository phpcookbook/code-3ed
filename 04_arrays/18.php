<?php
while (list($color,$fruit) = mysqli_fetch_assoc($r)) {
    $fruits[$color][] = $fruit;
}
