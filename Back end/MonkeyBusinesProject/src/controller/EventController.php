<?php namespace controller;

use model\repositories\eventRepository;
use view\eventView;

class eventController
{
    private $eventRepository;
    private $view;

    public function __construct(eventRepository $repository, eventView $view)
    {
        $this->eventRepository = $repository;
        $this->view = $view;
    }

    public function handleGetAll(){

        $events = $this->eventRepository->getAll();
        
        $this->view->show(['events' => $events]);
    }

    public function handleGetById($id){
        $event = $this->eventRepository->getById($id);
        $this->view->show(['event' => $event]);
    }

    public function handleGetByPersonId($personId)
    {
        $events = $this->eventRepository->getByPersonId($personId);
        $this->view->show(['event' => $events]);
    }

    public function handleGetByDate($from, $until)
    {
        $events = $this->eventRepository->getByDate($from, $until);
        $this->view->show(['event' => $events]);
    }

    public function handleGetByDateAndPersonId($personId, $from, $until)
    {
        $events = $this->eventRepository->getByDateAndPersonId($personId, $from, $until);
        $this->view->show(['event' => $events]);
    }

    public function handleAdd($event)
    {
        $this->eventRepository->add($event);
    }

    public function handleUpdate($eventId, $event)
    {
        $this->eventRepository->update($eventId, $event);
    }

    public function handleDelete($eventId)
    {
        $this->eventRepository->delete($eventId);
    }

}