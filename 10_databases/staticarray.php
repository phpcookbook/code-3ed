<?php
class DBCxn {
    // What DSNs to connect to?
    public static $dsn =
       array('zodiac' => 'sqlite:c:/data/zodiac.db',
             'users' => array('mysql:host=db.example.com','monty','7f2iuh'),
             'stats' => array('oci:statistics', 'statsuser','statspass'));


    // Internal variable to hold the connection
    private static $db = array();
    // No cloning or instantiating allowed
    final private function __construct() { }
    final private function __clone() { }

    public static function get($key) {
        if (! isset(self::$dsn[$key])) {
            throw new Exception("Unknown DSN: $key");
        }
        // Connect if not already connected
        if (! isset(self::$db[$key])) {
            if (is_array(self::$dsn[$key])) {
                // The next two lines only work with PHP 5.1.3 and above
                $c = new ReflectionClass('PDO');
                self::$db[$key] = $c->newInstanceArgs(self::$dsn[$key]);
            } else {
                self::$db[$key] = new PDO(self::$dsn[$key]);
            }
        }
        // Return the connection
        return self::$db[$key];
    }
}
