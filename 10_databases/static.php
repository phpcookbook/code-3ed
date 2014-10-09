<?php
class DBCxn {
    // What DSN to connect to?
    public static $dsn = 'sqlite:c:/data/zodiac.db';
    public static $user = null;
    public static $pass = null;
    public static $driverOpts = null;

    // Internal variable to hold the connection
    private static $db;
    // No cloning or instantiating allowed
    final private function __construct() { }
    final private function __clone() { }

    public static function get() {
        // Connect if not already connected
        if (is_null(self::$db)) {
            self::$db = new PDO(self::$dsn, self::$user, self::$pass,
                                self::$driverOpts);
        }
        // Return the connection
        return self::$db;
    }
}
