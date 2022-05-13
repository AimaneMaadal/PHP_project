<?php
abstract class Db
{
    private static $conn;

    public static function getInstance()
    {
        if (self::$conn != null) {
            // connection found, return connection
            return self::$conn;
        } else {
            self::$conn = new PDO('mysql:host=' . 'localhost' . ';dbname=' . 'imdribble', 'root', 'usbw');
            return self::$conn;
        }
    }
}
