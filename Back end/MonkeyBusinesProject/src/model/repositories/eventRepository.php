<?php
/**
 * Created by PhpStorm.
 * User: 11501537
 * Date: 26/03/2017
 * Time: 10:14
 */

namespace model\repositories;


use model\entities\Event;
use model\entities\eventException;

class eventRepository implements IDbRepository
{

    public function getAll()
    {
        $result = array();
        try {
            $connection = connectionBuilder::build();
            $query = $connection->query('SELECT * FROM events');

            while ($row = $query->fetch()) {
                $event = $this->parseEvent($row);
                array_push($this->getEventOrThrowException($event), $event);
            }
        } catch (\PDOException $ex){
            echo $ex->getMessage();
        }
        return $result;
    }

    public function getById($id)
    {
        $event = null;
        try {
            $connection = connectionBuilder::build();
            $query = $connection->prepare('SELECT * FROM events WHERE eventId = :id');
            $query->bindParam(':id', $id, \PDO::PARAM_INT);
            $query->execute();
            $event = $this->parseEvent($query->fetch());
        } catch (\PDOException $ex){
            echo $ex->getMessage();
        }
        return $this->getEventOrThrowException($event);
    }

    public function getByPersonId($id){
        $event = null;
        try {
            $connection = connectionBuilder::build();
            $query = $connection->prepare('SELECT * FROM events WHERE personId = :id');
            $query->bindParam(':id', $id, \PDO::PARAM_INT);
            $query->execute();
            $event = $this->parseEvent($query->fetch());
        } catch (\PDOException $ex){
            echo $ex->getMessage();
        }
        return $this->getEventOrThrowException($event);
    }

    public function getByDate($startDate, $endDate)
    {
        $event = null;
        try {
            $connection = connectionBuilder::build();
            $query = $connection->prepare('SELECT * FROM events WHERE start_date = :startDate AND end_date = :endDate');
            $query->bindParam(':startDate', dateConverter::convertToDatabaseFormat($startDate), \PDO::PARAM_INT);
            $query->bindParam(':endDate', dateConverter::convertToDatabaseFormat($endDate), \PDO::PARAM_INT);
            $query->execute();
            $event = $this->parseEvent($query->fetch());
        } catch (\PDOException $ex){
            echo $ex->getMessage();
        }
        return $this->getEventOrThrowException($event);
    }

    public function getByDateAndPersonId($startDate, $endDate, $personId)
    {
        $event = null;
        try {
            $connection = connectionBuilder::build();
            $query = $connection->prepare('SELECT * FROM events WHERE start_date = :startDate AND end_date = :endDate AND personId = :id');
            $query->bindParam(':startDate', dateConverter::convertToDatabaseFormat($startDate), \PDO::PARAM_STR);
            $query->bindParam(':endDate', dateConverter::convertToDatabaseFormat($endDate), \PDO::PARAM_STR);
            $query->bindParam(':id', $personId, \PDO::PARAM_INT);
            $query->execute();
            $event = $this->parseEvent($query->fetch());
        } catch (\PDOException $ex){
            echo $ex->getMessage();
        }
        return $this->getEventOrThrowException($event);
    }

    public function add(Event $event)
    {
        try {
            $connection = connectionBuilder::build();
            $query = $connection->prepare(
                'INSERT INTO events (name, start_date, end_date, personId) VALUES (:name, :start_date, :end_date, :personId)');
            $query->bindParam(':name',$event->getName(), \PDO::PARAM_STR);
            $query->bindParam(':startDate', dateConverter::convertToDatabaseFormat($event->getStartDate()), \PDO::PARAM_STR);
            $query->bindParam(':endDate', dateConverter::convertToDatabaseFormat($event->getEndDate()), \PDO::PARAM_STR);
            $query->bindParam(':personId',$event->getPersonId(), \PDO::PARAM_INT);
            $rowsAdded = $query->execute();
            echo "$rowsAdded rows are added";
        } catch (\PDOException $ex){
            throw new eventException("Failed to create new event");
        }
        return $this->getEventOrThrowException($event);
    }

    public function update($id, Event $event)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    private function parseEvent($row){
        $event = new Event();
        $event->setEventId($row[0]);
        $event->setName($row[1]);
        $event->setStartDate(dateConverter::convertToHumanReadableFormat($row[2]));
        $event->setEndDate(dateConverter::convertToHumanReadableFormat($row[3]));
        $event->setPersonId($row[4]);
        return $event;
    }

    private function getEventOrThrowException(Event $event){
        if ($event->getName() == null)
            throw new eventException("The query has returned no result");
        return $event;
    }
}