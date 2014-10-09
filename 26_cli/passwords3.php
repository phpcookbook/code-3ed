<?php
print "Login: ";
$username = rtrim(fgets(STDIN)) or die($php_errormsg);

preg_match('/^[a-zA-Z0-9]+$/',$username)
    or die("Invalid username: only letters and numbers allowed");

print 'Password: ';
`/bin/stty -echo`;
$password = rtrim(fgets(STDIN)) or die($php_errormsg);
`/bin/stty echo`;
print "\n";

// find corresponding line in /etc/passwd
$fh = fopen('/etc/passwd','r')   or die($php_errormsg);
$found_user = 0;
$pattern = '/^' . preg_quote($username) . ':/';
while (! ($found_user || feof($fh))) {
    $passwd_line = fgets($fh,256);
    if (preg_match($pattern,$passwd_line)) {
        $found_user = 1;
    }
}
fclose($fh);

$found_user or die ("Can't find user \"$username\"");

// parse the correct line from /etc/passwd
$passwd_parts = split(':',$passwd_line);

/* encrypt the entered password and compare it to the password in
   /etc/passwd */
$encrypted_password = crypt($password, $password_parts[1]);
if ($encrypted_password == $passwd_parts[1]) {
    print "login successful";
} else {
    print "login unsuccessful";
}
