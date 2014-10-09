<?php
$ffi = new FFI("[lib='msvcrt.dll'] int _getch();");

while(true) {
    // get a character from the keyboard
    $c = chr($ffi->_getch());
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
