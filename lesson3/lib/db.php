<?php

class DB{
    public static function getInstance(){
        if (is_null(self::$instance)){
            self::$instance = new PDO('mysql:host=localhost;port=3306;dbname=geek_brains', 'root', '');
        }
        return self::$instance;
    }

    private function __construct(){
    
    }
    private static $instance;
}