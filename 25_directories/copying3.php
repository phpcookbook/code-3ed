<?php
if (copy("/tmp/code.c", "/usr/local/src/code.c")) {
  unlink("/tmp/code.c");
}
