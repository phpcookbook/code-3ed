<?php
$password = '';
ncurses_init();
ncurses_addstr("Enter your password:\n");
/* Do not display the keystrokes as they are typed */
ncurses_noecho();
while (true) {
    // get a character from the keyboard
    $c = chr(ncurses_getch());
    if ( "\r" == $c ||  "\n" == $c ) {
        // if it's a newline, break out of the loop, we've got our password
        break;
    } elseif ("\x08" == $c) {
        /* if it's a backspace, delete the previous char from $password */
        $password = substr_replace($password,'',-1,1);
    } elseif ("\x03" == $c) {
        // if it's Control-C, clear $password and break out of the loop
        $password = NULL;
        break;
    } else {
        // otherwise, add the character to the password
        $password .= $c;
    }

}
ncurses_end();
