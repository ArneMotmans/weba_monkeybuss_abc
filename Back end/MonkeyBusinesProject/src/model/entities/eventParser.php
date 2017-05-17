<?php
/**
 * Created by PhpStorm.
 * User: 11501537
 * Date: 17/05/2017
 * Time: 10:08
 */

namespace model\entities;

use model\entities\Event;

class eventParser
{
    static function parseEvent($array){
        $event = new Event();
        $event->setEventName($array['event_name']);
        $event->setPersonId($array['personId']);
        $event->setStartDate($array['start_date']);
        $event->setEndDate($array['end_date']);
        return $event;
    }
}