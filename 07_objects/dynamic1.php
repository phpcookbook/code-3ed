<?php
class Users {
    static function find($args) {
        // here's where the real logic lives
        // for example a database query: 
        // SELECT user FROM users WHERE $args['field'] = $args['value'] 
    }

    static function __callStatic($method, $args) {
        if (preg_match('/^findBy(.+)$/', $method, $matches)) {
            return static::find(array('field' => $matches[1], 'value' => $args[0]));
        }
    }
}

$user = User::findById(123);
$user = User::findByEmail('rasmus@php.net');
