<?php
/**
 * Created by PhpStorm.
 * User: 11501537
 * Date: 26/03/2017
 * Time: 10:35
 */

namespace model\repositories;


class dateConverter
{
    private static function reverseYearAndDate($string){
        $dateElements = explode("-",$string);
        $dateString = $dateElements[2].'-'.$dateElements[1].'-'.$dateElements[0];
        $dateString = strtotime($dateString);
        return $dateString;
    }
    public static function convertToHumanReadableFormat($string){
        $date = date('d-m-Y',self::reverseYearAndDate($string));
        return $date;
    }

    public static function convertToDatabaseFormat($date){
        $date = date('Y-m-d',self::reverseYearAndDate($date));
        return $date;
    }
}