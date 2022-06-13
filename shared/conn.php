<?php

class DBConnection {

    private static $instance = null;

    public static function get()
    {
        if(self::$instance === null)
        {
            self::$instance = new PDO('mysql:host=localhost;dbname=adega_casablancas', 'root',  '');
        }

        return self::$instance;
    }
}
?>