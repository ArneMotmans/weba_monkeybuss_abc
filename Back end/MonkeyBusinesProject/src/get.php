<?php

require_once "../vendor/autoload.php";
use model\repositories\eventRepository;
use \model\entities\Event;
use model\entities\connectionBuilder;
use view\eventView;
use controller\eventController;


try {
    $repository = new eventRepository(connectionBuilder::build());
    $view = new eventView();
    $controller = new eventController($repository,$view);

    $controller->handleGetAll();
} catch (Exception $ex){
    echo $ex->getMessage();
}