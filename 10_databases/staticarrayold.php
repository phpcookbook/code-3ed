<?php
$args = self::$dsn[$key];
$argCount = count($args);
if ($argCount == 1) {
    self::$db[$key] = new PDO($args[0]);
} else if ($argCount == 2) {
    self::$db[$key] = new PDO($args[0],$args[1]);
} else if ($argCount == 3) {
    self::$db[$key] = new PDO($args[0],$args[1],$args[2]);
} else if ($argCount == 4) {
    self::$db[$key] = new PDO($args[0],$args[1],$args[2],$args[3]);
}
