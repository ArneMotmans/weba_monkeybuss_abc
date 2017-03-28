<?php

require_once "../vendor/autoload.php";
use model\repositories\eventRepository;
use \model\entities\Event;

$event = new Event();
$event->setName("I Love Techno");
$event->setStartDate('16-12-2017');
$event->setEndDate('16-12-2017');
$event->setPersonId(856);

$repository = new eventRepository();
try {
    $repository->add($event);
} catch (\model\entities\eventException $ex){
    echo $ex->getMessage();
}