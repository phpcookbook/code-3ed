<?php
class Model {
    protected static function validateArgs($args) {
        throw new Exception("You need to override this in a subclass!");
    }

    public static function find($args) {
        static::validateArgs($args);
        $class = get_called_class();
        // now you can do a database query, such as:
        // SELECT * FROM $class WHERE ...
    }
}

class Bicycle extends Model {
    protected static function validateArgs($args) {
        return true;
    }
}

Bicycle::find(['owner' => 'peewee']);
