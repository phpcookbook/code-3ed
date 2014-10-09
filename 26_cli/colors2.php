<?php
ncurses_init();
ncurses_start_color();

ncurses_init_pair(1, NCURSES_COLOR_GREEN, NCURSES_COLOR_BLACK);
ncurses_init_pair(2, NCURSES_COLOR_RED, NCURSES_COLOR_BLACK);
ncurses_init_pair(3, NCURSES_COLOR_WHITE, NCURSES_COLOR_BLACK);

ncurses_color_set(1);
ncurses_addstr("OK   ");
ncurses_color_set(3);
ncurses_addstr("Something succeeded!\n");
ncurses_color_set(2);
ncurses_addstr("FAIL ");
ncurses_color_set(3);
ncurses_addstr("Something succeeded!\n");
