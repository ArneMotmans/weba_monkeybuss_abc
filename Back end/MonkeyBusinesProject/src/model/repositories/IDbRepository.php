<?php namespace model\repositories;

use model\entities\Event;

interface IDbRepository
{
    public function getAll();
    public function getById($id);
    public function getByPersonId($id);
    public function getByDate($startDate, $endDate);
    public function getByDateAndPersonId($startDate, $endDate, $personId);
    public function add(Event $event);
    public function update($id, Event $event);
    public function delete($id);
}