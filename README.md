code-3ed
========

Code and Examples from PHP Cookbook 3rd Edition

Each directory contains the code examples from a chapter of the book.

Each code example is generally in a *.php file. For a given example, there may be some other files with the same basename but different extensions that indicate certain things about the code example -- expected output, special INI settings required, etc.

| Extension | Meaning |
|------|------|
| `php` | The code itself |
| `prepend` | The code expects this file to be the `auto_prepend_file` |
| `append` | The code expects this file to be the `auto_append_file` |
| `min-version` | The code works with this PHP version at minimum |
| `ini` | The code needs these INI settings |
| `skip` | The code is not a self-contained runnable example but its syntax should be correct |
| `out` | Expected output of the code |
| `out.strip` | The expected output in the `.out` file should have newlines removed to match the actual expected output |
| `out.regex` | The output is expected to match the pattern in this file |
| `err.regex` | The error output is expected to match the pattern in this file |
| `stdin` | The contents of this file should be fed to the code on standard input |
| `args` | The code needs these PHP command line args |
| `server` | The code expects to talk to a server running the PHP code in this file on port 9876 (with `php -S localhost:9876 whatever.server` ) |
| `server.ini` | The server code expects these INI settings (e.g.`php -S whatever.server.ini -S localhost:9876 whatever.server`) |
