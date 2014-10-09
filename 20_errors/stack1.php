<?php
function stooges() {
  print "woo woo woo!\n";
  larry();
}

function larry() {
  curly();
}

function curly() {
  moe();
}

function moe() {
  debug_print_backtrace();
}

stooges();
