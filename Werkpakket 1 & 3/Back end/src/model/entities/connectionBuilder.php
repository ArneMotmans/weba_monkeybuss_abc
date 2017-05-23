<?php
/**
 * Created by PhpStorm.
 * User: 11501537
 * Date: 26/03/2017
 * Time: 10:16
 */

namespace model\entities;

class connectionBuilder
{
    public static function build(){
        $db = new \PDO("mysql:host=192.168.241.140;dbname=Monkey_Business", "user", "user");
        $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        return $db;
    }

}