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

    $id = isset($_GET['id']) ? $_GET['id'] : null;
    $controller->handleGetById($id);
} catch (Exception $ex){
    echo $ex->getMessage();
}