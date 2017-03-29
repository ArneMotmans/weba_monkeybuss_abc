<?php namespace controller;

use model\repositories\eventRepository;
use view\eventView;

class eventController
{
    private $repository;
    private $view;

    public function __construct(eventRepository $repository, eventView $view)
    {
        $this->repository = $repository;
        $this->view = $view;
    }

    public function handleGetAll(){
        $events = $this->repository->getAll();
        foreach ($events as &$event){
            $this->view->show(['event' => $event]);
        }
    }

    public function handleGetById($id){
        $event = $this->repository->getById($id);
        $this->view->show(['event' => $event]);
    }

    public function handleGetByPersonId($personId)
    {
        $events = $this->eventRepository->getOpPersoon($personId);
        $this->view->show(['events' => $events]);
    }

    public function handleGetByDate($from, $until)
    {
        $events = $this->eventRepository->getOpDatum($from, $until);
        $this->view->show(['events' => $events]);
    }

    public function handleGetByDateAndPersonId($personId, $from, $until)
    {
        $events = $this->eventRepository->getOpDatumEnPersoon($personId, $from, $until);
        $this->view->show(['events' => $events]);
    }

    public function handleAdd($event)
    {
        $this->eventRepository->createEvent($event);
    }

    public function handleUpdate($eventId, $event)
    {
        $this->eventRepository->updateEvent($eventId, $event);
    }

    public function handleDelete($eventId)
    {
        $this->eventRepository->deleteEvent($eventId);
    }

}