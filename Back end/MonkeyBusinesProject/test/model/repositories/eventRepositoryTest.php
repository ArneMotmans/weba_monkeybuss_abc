<?php namespace test\model\repository;


class eventRepositoryTest extends PHPUnit_Framework_Testcase{

    private $builder;

    public function setUp(){
        $this->mockPDO = $this->getMockBuilder('\PDO')
            ->disableOriginalConstructor()
            ->getMock();

        $this->mockPDOStatement = $this->getMockBuilder('\PDO')
            ->disableOriginalConstructor()
            ->getMock();

    }

    public function tearDown(){
        $this->mockPDO = null;
        $this->mockPDOStatement = null;
    }

    public function testGetAll_EventArray(){
        $this->builder = new eventBuilder();
        $events = array(
            $this->builder->withId()->build(),
            $this->builder->withId()->build(),
            $this->builder->withId()->build());

        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('fetch')
            ->will($this->returnValue());


    }

}
