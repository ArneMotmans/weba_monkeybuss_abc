<?php namespace test\controller;

require __DIR__. "/../../vendor/autoload.php";
require __DIR__ . "/../eventBuilder.php";
require __DIR__ . "/../../src/model/repositories/eventRepository.php";

use model\entities\Event;
use model\entities\eventException;
use model\repositories\eventRepository;
use view\eventView;
use controller\eventController;
use PHPUnit\Runner\Exception;
use test\model\repository\eventBuilder;

class eventControllerTest extends \PHPUnit\Framework\TestCase
{
    private $builder;
    private $mockEventRepository;
    private $mockView;

    public function setUp()
    {
        $this->mockEventRepository = $this->getMockBuilder('model\repositories\eventRepository')
            ->disableOriginalConstructor()
            ->getMock();
        $this->mockView = $this->getMockBuilder('view\eventView')
            ->disableOriginalConstructor()
            ->getMock();
        $this->builder = new eventBuilder();
    }

    public function tearDown()
    {
        $this->mockEventRepository = null;
        $this->mockView = null;
    }

    public function test_get_allEvents_eventsFound_stringWithIdNameStartDateEndDatePersonId()
    {
        $events = array(
            $this->builder->withId()->build(),
            $this->builder->withId()->build(),
            $this->builder->withId()->build()
        );
        $this->mockEventRepository->expects($this->atLeastOnce())
            ->method('getAll')
            ->will($this->returnValue($events));

        foreach ($events as $event) {
            $this->setExpectShowMockViewEvent();
        }

        $eventController = new eventController($this->mockEventRepository, $this->mockView);
        $eventController->handleGetAll();
        $this->expectOutputString($this->loopOutput($events));

    }

    public function test_handleGetAll_eventsNotFound_returnStringEmpty()
    {
        $this->mockEventRepository->expects($this->atLeastOnce())
            ->method('getAll')
            ->will($this->returnValue(null));

        $this->setExpectedShowMockViewEmpty();

        $eventController = new eventController($this->mockEventRepository, $this->mockView);
        $eventController->handleGetAll();
        $this->expectOutputString('');
    }

    public function testHandleGetById_eventFound_stringWithIdNameStartDateEndDatePersonId()
    {
        $event = $this->builder->withId()->build();
        $this->mockEventRepository->expects($this->atLeastOnce())
            ->method('getById')
            ->will($this->returnValue($event));

        $this->setExpectShowMockViewEvent();

        $eventController = new eventController($this->mockEventRepository, $this->mockView);
        $eventController->handleGetById($event->getEventId());
        $this->expectOutputString(sprintf("%d %s %s %s %d", $event->getEventId(), $event->getEventName(), $event->getStartDate(), $event->getEndDate(), $event->getPersonId()));
    }

    public function test_handleGetById_eventNotFound_returnStringEmpty()
    {
        $this->mockEventRepository->expects($this->atLeastOnce())
            ->method('getById')
            ->will($this->returnValue(null));

        $this->setExpectedShowMockViewEmpty();

        $eventController = new eventController($this->mockEventRepository, $this->mockView);
        $eventController->handleGetById(rand(1,100));
        $this->expectOutputString('');
    }

    public function test_handleGetByPersonId_eventFound_stringWithIdNameStartDateEndDatePersonId()
    {
        $event = $this->builder->withId()->build();
        $this->mockEventRepository->expects($this->atLeastOnce())
            ->method('getByPersonId')
            ->will($this->returnValue($event));

        $this->setExpectShowMockViewEvent();

        $eventController = new eventController($this->mockEventRepository, $this->mockView);
        $eventController->handleGetByPersonId($event->getPersonId());
        $this->expectOutputString(sprintf("%d %s %s %s %d", $event->getEventId(), $event->getEventName(), $event->getStartDate(), $event->getEndDate(), $event->getPersonId()));
    }

    public function test_handleGetByPersonId_eventNotFound_returnsStringEmpty()
    {
        $this->mockEventRepository->expects($this->atLeastOnce())
            ->method('getByPersonId')
            ->will($this->returnValue(null));

        $this->setExpectedShowMockViewEmpty();

        $eventController = new eventController($this->mockEventRepository, $this->mockView);
        $eventController->handleGetByPersonId(rand(1,100));
        $this->expectOutputString('');
    }

    public function test_handleGetByDate_eventFound_stringWithIdNameStartDateEndDatePersonId()
    {
        $event = $this->builder->withId()->build();
        $this->mockEventRepository->expects($this->atLeastOnce())
            ->method('getByDate')
            ->will($this->returnValue($event));

        $this->setExpectShowMockViewEvent();

        $eventController = new eventController($this->mockEventRepository, $this->mockView);
        $eventController->handleGetByDate($event->getStartDate(), $event->getEndDate());
        $this->expectOutputString(sprintf("%d %s %s %s %d", $event->getEventId(), $event->getEventName(), $event->getStartDate(), $event->getEndDate(), $event->getPersonId()));
    }

    public function test_handleGetByDate_eventNotFound_returnsStringEmpty()
    {
        $event = $this->builder->withId()->build();
        $this->mockEventRepository->expects($this->atLeastOnce())
            ->method('getByDate')
            ->will($this->returnValue(null));

        $this->setExpectedShowMockViewEmpty();

        $eventController = new eventController($this->mockEventRepository, $this->mockView);
        $eventController->handleGetByDate($event->getStartDate(), $event->getEndDate());
        $this->expectOutputString('');
    }

    public function test_handleGetByDateAndPersonId_eventFound_stringWithIdNameStartDateEndDatePersonId()
    {
        $event = $this->builder->withId()->build();
        $this->mockEventRepository->expects($this->atLeastOnce())
            ->method('getByDateAndPersonId')
            ->will($this->returnValue($event));

        $this->setExpectShowMockViewEvent();

        $eventController = new eventController($this->mockEventRepository, $this->mockView);
        $eventController->handleGetByDateAndPersonId($event->getStartDate(), $event->getEndDate(), $event->getEventId());
        $this->expectOutputString(sprintf("%d %s %s %s %d", $event->getEventId(), $event->getEventName(), $event->getStartDate(), $event->getEndDate(), $event->getPersonId()));
    }

    public function test_handleGetByDateAndPersonId_eventNotFound_returnsStringEmpty()
    {
        $event = $this->builder->withId()->build();
        $this->mockEventRepository->expects($this->atLeastOnce())
            ->method('getByDateAndPersonID');

        $this->setExpectedShowMockViewEmpty();

        $eventController = new eventController($this->mockEventRepository, $this->mockView);
        $eventController->handleGetByDateAndPersonId($event->getStartDate(), $event->getEndDate(), $event->getEventId());
        $this->expectOutputString('');
    }

    public function test_handleAdd_eventAdded()
    {
        $event = $this->builder->withId()->build();
        $this->mockEventRepository->expects($this->atLeastOnce())
            ->method('add');

        $eventController = new eventController($this->mockEventRepository, $this->mockView);
        $eventController->handleAdd($event);
    }

    public function test_handleUpdate_eventUpdated()
    {
        $event = $this->builder->withId()->build();
        $this->mockEventRepository->expects($this->atLeastOnce())
            ->method('update');

        $eventController = new eventController($this->mockEventRepository, $this->mockView);
        $eventController->handleUpdate($event->getEventId(), $event);
    }

    public function test_handleDelete_eventDeleted()
    {
        $event = $this->builder->withId()->build();
        $this->mockEventRepository->expects($this->atLeastOnce())
            ->method('delete');

        $eventController = new eventController($this->mockEventRepository, $this->mockView);
        $eventController->handleDelete($event->getEventId());
    }

    private function setExpectShowMockViewEvent()
    {
        $this->mockView->expects($this->atLeastOnce())
            ->method('show')
            ->will($this->returnCallback(function ($object) {
                $event = $object['event'];
                printf("%d %s %s %s %d", $event->getEventId(), $event->getEventName(), $event->getStartDate(), $event->getEndDate(), $event->getPersonId());
            }));
    }

    public function setExpectedShowMockViewEmpty()
    {
        $this->mockView->expects($this->atLeastOnce())
            ->method('show')
            ->will($this->returnCallback(function ($object) {
                echo '';
            }));
    }

    private function loopOutput($events)
    {
        foreach ($events as $event) {
            sprintf("%d %s %s %s %d", $event->getEventId(), $event->getEventName(), $event->getStartDate(), $event->getEndDate(), $event->getPersonId());
        }
    }
}