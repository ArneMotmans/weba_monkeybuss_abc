<?php
/**
 * Created by PhpStorm.
 * User: 11500191
 * Date: 29/03/2017
 * Time: 9:06
 */

namespace controller;

use model\EventRepository;
use view\View;

class EventController
{
private $eventRepository;
private $view;

    public function __construct(EventRepository $eventRepository, View $view)
    {
        $this->eventRepository = $eventRepository;
        $this->view = view;
    }

    public function handleGetAll()
    {
        $events = $this->eventRepository->getAll();
        $this->view->show(['event' => $events]);
    }

    public function handleGetOpAfspraak($eventId)
    {
        $event = $this->eventRepository->getOpAfspraak($eventId);
        $this->view->show(['event' => $events]);
    }

    public function handleGetOpPersoon($personId)
    {
        $events = $this->eventRepository->getOpPersoon($personId);
        $this->view->show(['events' => $events]);
    }

    public function handleGetOpDatum($from, $until)
    {
        $events = $this->eventRepository->getOpDatum($from, $until);
        $this->view->show(['events' => $events]);
    }

    public function handleGetOpDatumEnPersoon($personId, $from, $until)
    {
        $events = $this->eventRepository->getOpDatumEnPersoon($personId, $from, $until);
        $this->view->show(['events' => $events]);
    }

    public function handleCreateEvent($event) {
        $this->eventRepository->createEvent($event);
    }

    public function handleUpdateEvent($eventId, $event) {
        $this->eventRepository->updateEvent($eventId, $event);
    }

    public function handleDelete_Event($eventId) {
        $this->eventRepository->deleteEvent($eventId);
    }
}