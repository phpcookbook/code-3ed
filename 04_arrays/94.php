<?php
foreach ($_GET['fruits'] as $fruit) {
    if (!in_array($fruit, $array)) { $array[] = $fruit; }
}
