<?php
$circle = new circle;
if ($circle->draw($origin, $radius)) {
    $circle->parent::draw();
}
