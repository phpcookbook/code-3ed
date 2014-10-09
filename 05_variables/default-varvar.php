<?php
foreach ($defaults as $k => $v) {
    if (! isset($$k)) { $$k = $v; }
}
