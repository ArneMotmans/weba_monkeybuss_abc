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
        $this->event->setStartDate(date(rand(1,PHP_INT_MAX)));
        $this->event->setEndDate(date(rand(1,PHP_INT_MAX)));
        $this->event->setPersonId(rand(1,100));
        return $this->event;
    }
    public function withId(){
        $this->event->setEventId(rand(1,PHP_INT_MAX));
        return $this;
    }
}