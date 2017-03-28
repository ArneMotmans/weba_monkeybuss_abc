<?php
/**
 * Created by PhpStorm.
 * User: 11501537
 * Date: 26/03/2017
 * Time: 10:16
 */

namespace model\repositories;

class connectionBuilder
{
    public static function build(){
        $db = new \PDO("mysql:host=localhost;dbname=Monkey_Business", "user", "user");
        return $db;
    }

}