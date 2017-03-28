<?php namespace test\controller;

use controller\eventController;
use model\entities\Event;
use model\repositories\IDbRepository;
use Phpunit_Framework_Mockobject;

class eventControllerTest extends PHPUnit_Framework_Testcase
{
    public function test_get_allEvents()
    {
        //Arrange
        $eventBuilder = new eventBuilder();
        $events = array(
            $eventBuilder->withId()->build(),
            $eventBuilder->withId()->build(),
            $eventBuilder->withId()->build()
        );

        $mockRepository = $this->getMockBuilder('IEventRepository')
            ->getMock();
        $mockRepository->expects($this->atLeastOnce())
            ->method('getAll')
            ->will($this->returnValue($events));

        $controller = new eventController($mockRepository);

        //Act


        //Assert

    }

}