<programlisting><userinput>--TEST--
str_replace() function
--FILE--</userinput></programlisting>
<programlisting language="php">&lt;?php
$str = 'Hello, all!';
var_dump(str_replace('all', 'world', $str));
?&gt;
--EXPECT--
string(13) "Hello, world!"</programlisting>
