<?php
/**
 * Created by PhpStorm.
 * User: 11501537
 * Date: 29/03/2017
 * Time: 10:54
 */

namespace test\model\repository;
use model\entities\Event;

class eventBuilder
{
    private $event;
    public function __construct()
    {
        $this->event = new Event();
    }
    public function build(){
        $this->event->setEventName(uniqid());
        $this->event->setStartDate(date());
        $this->event->setEndDate(date());
        $this->event->setPersonId(rand());
        return $this->event;
    }
    public function withId(){
        $this->event->setEventId(rand(1,PHP_INT_MAX));
        return $this;
    }
}