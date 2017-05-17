<?php

//error_reporting(E_ALL);
//ini_set("display_errors","On");

require_once "../vendor/autoload.php";

use model\repositories\eventRepository;
use model\entities\connectionBuilder;
use view\eventView;
use controller\eventController;
use routing\AltoRouter;
use model\entities\eventParser;


try {
    $repository = new eventRepository(connectionBuilder::build());
    $view = new eventView();
    $controller = new eventController($repository,$view);
    $router = new AltoRouter();

    $router->setBasePath("/~user/Monkey_Business/");

    $router->map('POST','events', function () use ($controller){ //GET mag geen body 
        $data = json_decode(file_get_contents('php://input'));
        $data = (array)$data;
        if (isset($data['person_id'])){
            if (isset($data['start_date']) && isset($data['end_date'])) {
                $controller->handleGetByDateAndPersonId($data['start_date'], $data['end_date'], $data['person_id']);
            } else{
                $controller->handleGetByPersonId($data['person_id']);
            }
        } else {
            if (isset($data['start_date']) && isset($data['end_date'])) {
                $controller->handleGetByDate($data['start_date'], $data['end_date']);
            } else {
                $controller->handleGetAll();
            }
        }
    });

    $router->map('GET','events/[i:id]', function ($id) use ($controller){
        $controller->handleGetById($id);
    });

    $router->map('POST', 'events', function () use ($controller) {
        $data = json_decode(file_get_contents('php://input'));
        $data = (array)$data;
        $event = eventParser::parseEvent($data);
        $controller->handleAdd($event);
    });

    $match = $router->match();

    if( $match && is_callable( $match['target'] ) ){
        call_user_func_array( $match['target'], $match['params'] );
    }

} catch (Exception $ex){
    echo $ex->getMessage();
}