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


error_reporting(E_ALL);
ini_set("display_errors","On");

class eventRepository implements IDbRepository
{

    private $connection = null;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function getAll()
    {
        $result = array();
        try {
            $query = $this->connection->query('SELECT * FROM events');
            while ($row = $query->fetch()) {
                $event = $this->parseEvent($row);
                array_push($result,$this->getEventOrThrowException($event));
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
            $query = $this->connection->prepare('SELECT * FROM events WHERE eventId = :id');
            $query->bindParam(':id', $id, \PDO::PARAM_INT);
            $query->execute();
            $event = $this->parseEvent($query->fetch());
        } catch (\PDOException $ex){
            echo $ex->getMessage();
        }
        return $this->getEventOrThrowException($event);
    }

    public function getByPersonId($id){
        $result = array();
        try {
            $query = $this->connection->prepare('SELECT * FROM events WHERE personId = :id');
            $query->bindParam(':id', $id, \PDO::PARAM_INT);
            $query->execute();
            while ($row = $query->fetch()) {
                $event = $this->parseEvent($row);
                array_push($result,$this->getEventOrThrowException($event));
            }
        } catch (\PDOException $ex){
            echo $ex->getMessage();
        }
        return $result;
    }

    public function getByDate($startDate, $endDate)
    {
        $event = null;
        try {
            $query = $this->connection->prepare('SELECT * FROM events WHERE start_date = :startDate AND end_date = :endDate');
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
            $query = $this->connection->prepare('SELECT * FROM events WHERE start_date = :startDate AND end_date = :endDate AND personId = :id');
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
            $query = $this->connection->prepare("INSERT INTO events (eventName, start_date, end_date, personId) VALUES (:eventName, :start_date, :end_date, :personId)");
            $query->bindParam(':eventName',$event->getEventName(), \PDO::PARAM_STR);
            $query->bindParam(':start_date', dateConverter::convertToDatabaseFormat($event->getStartDate()));
            $query->bindParam(':end_date', dateConverter::convertToDatabaseFormat($event->getEndDate()));
            $query->bindParam(':personId',$event->getPersonId(), \PDO::PARAM_INT);
            $query->execute();
            echo 'Row successfully added';
        } catch (\PDOException $ex){
            throw new eventException("Failed to create new event : ".$ex->getMessage());
        }
    }

    public function update($id, Event $event)
    {
        try {
            $query = $this->connection->prepare("UPDATE events SET eventName = :eventName, start_date = :start_date, end_date = :end_date, personId = :personId WHERE eventId = :id");
            $query->bindParam(':eventName',$event->getEventName(), \PDO::PARAM_STR);
            $query->bindParam(':start_date', dateConverter::convertToDatabaseFormat($event->getStartDate()));
            $query->bindParam(':end_date', dateConverter::convertToDatabaseFormat($event->getEndDate()));
            $query->bindParam(':personId',$event->getPersonId(), \PDO::PARAM_INT);
            $query->bindParam(':id',$id,\PDO::PARAM_INT);
            $query->execute();
            echo 'Row successfully updated';
        } catch (\PDOException $ex){
            throw new eventException("Failed to update event : ".$ex->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $query = $this->connection->prepare('DELETE FROM events WHERE eventId = :id');
            $query->bindParam(':id',$id,\PDO::PARAM_INT);
            $query->execute();
            echo 'Row is successfully deleted';
        } catch (\PDOException $ex){
            throw new eventException("Failed to delete event");
        }
    }

    private function parseEvent($row){
        $event = new Event();
        $event->setEventId($row[0]);
        $event->setEventName($row[1]);
        $event->setStartDate(dateConverter::convertToHumanReadableFormat($row[2]));
        $event->setEndDate(dateConverter::convertToHumanReadableFormat($row[3]));
        $event->setPersonId($row[4]);
        return $event;
    }

    private function getEventOrThrowException(Event $event){
        if ($event->getEventName() == null)
            throw new eventException("The query has failed");
        return $event;
    }
}