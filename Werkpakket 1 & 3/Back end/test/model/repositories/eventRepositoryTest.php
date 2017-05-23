<?php namespace test\model\repository;

require __DIR__. "/../../../vendor/autoload.php";
require __DIR__ . "/../../eventBuilder.php";
require __DIR__ . "/../../../src/model/repositories/eventRepository.php";

use model\entities\Event;
use model\entities\eventException;
use model\repositories\eventRepository;
use PHPUnit\Runner\Exception;

class eventRepositoryTest extends \PHPUnit\Framework\TestCase
{
    private $builder;
    private $mockPDO;
    private $mockPDOStatement;

    public function setUp(){
        $this->mockPDO = $this->getMockBuilder('PDO')
            ->disableOriginalConstructor()
            ->getMock();

        $this->mockPDOStatement = $this->getMockBuilder('PDOStatement')
            ->disableOriginalConstructor()
            ->getMock();
        $this->builder = new eventBuilder();

    }

    public function tearDown(){
        $this->mockPDO = null;
        $this->mockPDOStatement = null;
    }

    public function testGetAll_EventArray(){
        //Arrange
        $events = array(
            $this->builder->withId()->build(),
            $this->builder->withId()->build(),
            $this->builder->withId()->build());

        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('fetch')
            ->will($this->returnValue($events));

        //Act
        $eventRepository = new eventRepository($this->mockPDO);
        $actualEvents = $eventRepository->getAll();

        //Assert
        $this->assertEquals($events, $actualEvents);
    }

    public function testGetAll_exceptionThrownFromPDO()
    {
        $this->expectException(eventException::class);

        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('fetch')
            ->will($this->throwException(new eventException()));
        $eventRepository = new eventRepository($this->mockPDO);
        $eventRepository->getAll();
    }

    public function testGetById_idExists_EventObject() {
        //Arrange
        $event = $this->builder->withId()->build();

        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('bindParam');

        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('execute');

        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('fetch')
            ->will($this->returnValue($event));

        $this->mockPDO->expects($this->atLeastOnce())
            ->method('prepare')
            ->will($this->returnValue($this->mockPDOStatement));

        //Act
        $eventRepository = new eventRepository($this->mockPDO);
        $actualEvent = $eventRepository->getById($event->getEventId());

        //Assert
        $this->assertEquals($event, $actualEvent);
    }

    public function testGetById_idDoesNotExist_Null()
    {
        //Arrange
        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('bindParam');

        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('execute');

        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('fetch')
            ->will($this->returnValue(null));

        $this->mockPDO->expects($this->atLeastOnce())
            ->method('prepare')
            ->will($this->returnValue($this->mockPDOStatement));

        //Act
        $eventRepository = new eventRepository($this->mockPDO);
        $actualEvent = $eventRepository->getById(rand(1,100));

        //Assert
        $this->assertNull($actualEvent);
    }


    public function testGetById_exceptionThrownFromPDO_eventExeption()
    {
        $this->expectException(eventException::class);

        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('bindParam')->will($this->throwException(new eventException()));

        $this->mockPDO->expects($this->atLeastOnce())
            ->method('prepare')
            ->will($this->returnValue($this->mockPDOStatement));

        $pdoRepository = new eventRepository($this->mockPDO);
        $actualEvent = $pdoRepository->getById(rand(1, 100));

    }


    public function testGetByPersonId_PersonIdExists_EventObject()
    {
        //Arrange
        $event = $this->builder->withId()->build();

        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('bindParam');

        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('execute');

        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('fetch')
            ->will($this->returnValue($event));

        $this->mockPDO->expects($this->atLeastOnce())
            ->method('prepare')
            ->will($this->returnValue($this->mockPDOStatement));
        //Act
        $eventRepository = new eventRepository($this->mockPDO);
        $actualEvent = $eventRepository->getByPersonId(rand(1,100));
        //Assert
        $this->assertEquals($event, $actualEvent);
    }

    public function testGetByPersonId_PersonIdDoesNotExist_Null()
    {
        //Arrange
        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('bindParam');

        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('execute');

        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('fetch')
            ->will($this->returnValue(null));

        $this->mockPDO->expects($this->atLeastOnce())
            ->method('prepare')
            ->will($this->returnValue($this->mockPDOStatement));

        //Act
        $eventRepository = new eventRepository($this->mockPDO);
        $actualEvent = $eventRepository->getByPersonId(rand(1,100));

        //Assert
        $this->assertNull($actualEvent);
    }

    public function testGetByPersonId_exceptionThrownFromPDO_eventException() {
        $this->expectException(eventException::class);

        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('bindParam')->will($this->throwException(new eventException()));

        $this->mockPDO->expects($this->atLeastOnce())
            ->method('prepare')
            ->will($this->returnValue($this->mockPDOStatement));

        $pdoRepository = new eventRepository($this->mockPDO);
        $actualEvent = $pdoRepository->getByPersonId(rand(1, 100));
    }


    public function testGetByDate_DateExists_EventObject()
    {
        //Arrange
        $event = $this->builder->withId()->build();

        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('bindParam');

        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('execute');

        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('fetch')
            ->will($this->returnValue($event));

        $this->mockPDO->expects($this->atLeastOnce())
            ->method('prepare')
            ->will($this->returnValue($this->mockPDOStatement));
        //Act
        $eventRepository = new eventRepository($this->mockPDO);
        $actualEvent = $eventRepository->getByDate('02-06-2011', '05-06-2012');
        //Assert
        $this->assertEquals($event, $actualEvent);
    }

    public function testGetByDate_DateDoesNotExist_Null()
    {
        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('bindParam');

        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('execute');

        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('fetch')
            ->will($this->returnValue(null));

        $this->mockPDO->expects($this->atLeastOnce())
            ->method('prepare')
            ->will($this->returnValue($this->mockPDOStatement));
        //Act
        $eventRepository = new eventRepository($this->mockPDO);
        $actualEvent = $eventRepository->getByDate('02-06-2011', '05-06-2012');
        //Assert
        $this->assertNull($actualEvent);
    }

    public function testGetByDate_exceptionThrownFromPDO_eventException()
    {
        $this->expectException(eventException::class);

        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('bindParam')->will($this->throwException(new eventException()));

        $this->mockPDO->expects($this->atLeastOnce())
            ->method('prepare')
            ->will($this->returnValue($this->mockPDOStatement));

        $pdoRepository = new eventRepository($this->mockPDO);
        $actualEvent = $pdoRepository->getByDate('02-06-2011', '05-06-2012');
    }

    public function testGetByDateAndPersonId_DateAndPersonIdExist_EventObject()
    {
        //Arrange
        $event = $this->builder->withId()->build();
        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('bindParam');

        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('execute');

        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('fetch')
            ->will($this->returnValue($event));

        $this->mockPDO->expects($this->atLeastOnce())
            ->method('prepare')
            ->will($this->returnValue($this->mockPDOStatement));
        //Act
        $eventRepository = new eventRepository($this->mockPDO);
        $actualEvent = $eventRepository->getByDateAndPersonId('02-06-2011', '05-06-2012', rand(1,100));
        //Assert
        $this->assertEquals($event, $actualEvent);
    }

    public function testGetByDateAndPersonId_DateOrPersonIdDoesNotExist_Null()
    {
        //Arrange
        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('bindParam');

        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('execute');

        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('fetch')
            ->will($this->returnValue(null));

        $this->mockPDO->expects($this->atLeastOnce())
            ->method('prepare')
            ->will($this->returnValue($this->mockPDOStatement));
        //Act
        $eventRepository = new eventRepository($this->mockPDO);
        $actualEvent = $eventRepository->getByDateAndPersonId('02-06-2011', '05-06-2012', rand(1,100));
        //Assert
        $this->assertNull($actualEvent);
    }

    public function testGetByDateAndPersonId_exceptionThrownFromPDO_eventException()
    {
        $this->expectException(eventException::class);

        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('bindParam')->will($this->throwException(new eventException()));

        $this->mockPDO->expects($this->atLeastOnce())
            ->method('prepare')
            ->will($this->returnValue($this->mockPDOStatement));

        $pdoRepository = new eventRepository($this->mockPDO);
        $actualEvent = $pdoRepository->getByDateAndPersonId('02-06-2011', '05-06-2012', rand(1,100));
    }
    
    public function testAdd_NewEventIsAddedToPDO()
    {
        //Arrange
        $event = $this->builder->withId()->build();
        $this->mockPDOStatement->expects($this->atLeast(4))
            ->method('bindParam');

        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('execute');

        $this->mockPDO->expects($this->atLeastOnce())
            ->method('prepare')
            ->will($this->returnValue($this->mockPDOStatement));
        //Act
        $eventRepository = new eventRepository($this->mockPDO);
        $eventRepository->add($event);
        //Assert

    }

    public function testAdd_exceptionThrownFromPDO_eventException()
    {
        //Arrange
        $this->expectException(eventException::class);

        $event = $this->builder->withId()->build();
        $this->mockPDOStatement->expects($this->atLeast(4))
            ->method('bindParam')->will($this->throwException(new eventException()));

        $this->mockPDO->expects($this->atLeastOnce())
            ->method('prepare')
            ->will($this->returnValue($this->mockPDOStatement));
        $pdoRepository = new eventRepository($this->mockPDO);
        //Act
        $pdoRepository->add($event);

        //Assert
    }

    public function testUpdate_ExistingEventIsUpdatedInPDO()
    {
        //Arrange
        $event = $this->builder->withId()->build();
        $this->mockPDOStatement->expects($this->atLeast(4))
            ->method('bindParam');

        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('execute');

        $this->mockPDO->expects($this->atLeastOnce())
            ->method('prepare')
            ->will($this->returnValue($this->mockPDOStatement));
        //Act
        $eventRepository = new eventRepository($this->mockPDO);
        $eventRepository->Update($event->getEventId(), $event);
        //Assert

    }

    public function testUpdate_exceptionThrownFromPDO_eventException()
    {
        //Arrange
        $this->expectException(eventException::class);

        $event = $this->builder->withId()->build();
        $this->mockPDOStatement->expects($this->atLeast(5))
            ->method('bindParam')->will($this->throwException(new eventException()));

        $this->mockPDO->expects($this->atLeastOnce())
            ->method('prepare')
            ->will($this->returnValue($this->mockPDOStatement));
        $pdoRepository = new eventRepository($this->mockPDO);
        //Act
        $pdoRepository->Update($event->getEventId(), $event);

        //Assert
    }

    public function testDelete_ExistingEventIsDeletedFromPDO()
    {
        //Arrange
        $event = $this->builder->withId()->build();
        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('bindParam');

        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('execute');

        $this->mockPDO->expects($this->atLeastOnce())
            ->method('prepare')
            ->will($this->returnValue($this->mockPDOStatement));
        //Act
        $eventRepository = new eventRepository($this->mockPDO);
        $eventRepository->delete($event->getEventId());
        //Assert

    }

    public function testDelete_exceptionThrownFromPDO_eventException()
    {
        //Arrange
        $this->expectException(eventException::class);

        $event = $this->builder->withId()->build();
        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('bindParam')->will($this->throwException(new eventException()));

        $this->mockPDO->expects($this->atLeastOnce())
            ->method('prepare')
            ->will($this->returnValue($this->mockPDOStatement));
        $pdoRepository = new eventRepository($this->mockPDO);
        //Act
        $pdoRepository->Delete($event->getEventId());

        //Assert
    }

}
