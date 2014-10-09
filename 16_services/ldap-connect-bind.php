$ds = ldap_connect('ldap.example.com')                 or die($php_errormsg);
ldap_bind($ds)                                         or die($php_errormsg);
