<?php
system('ls -al '.escapeshellarg($directory));
system(escapeshellcmd($ls_program).' -al');
