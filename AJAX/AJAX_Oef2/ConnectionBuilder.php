<?php

/**
 * Created by PhpStorm.
 * User: 11501537
 * Date: 22/04/2017
 * Time: 12:48
 */
class ConnectionBuilder
{
    public static function GetConnection(){
        $db = new \PDO("mysql:host=localhost;dbname=web_advanced", "root", "");
        $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        return $db;
    }
}