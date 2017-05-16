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

    error_reporting(E_ALL);
    ini_set("display_errors", "On");

    $controller->handleGetAll();
} catch (Exception $ex){
    echo $ex->getMessage();
}