<?php
$line = '';
ncurses_init();
ncurses_addstr("Type a message, ending with !\n");
/* Display the keystrokes as they are typed */
ncurses_echo();
while (($c = ncurses_getch()) != ord("!")) {
    $line .= chr($c);
}
ncurses_end();
print "You typed: [$line]\n";
