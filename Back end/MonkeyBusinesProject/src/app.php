<?php

error_reporting(E_ALL);
ini_set("display_errors","On");

require_once "../vendor/autoload.php";

use model\repositories\eventRepository;
use model\entities\connectionBuilder;
use view\eventView;
use controller\eventController;
use routing\AltoRouter;


try {
    $repository = new eventRepository(connectionBuilder::build());
    $view = new eventView();
    $controller = new eventController($repository,$view);
    $router = new AltoRouter();

    $router->setBasePath("/~user/Monkey_Business/");

    $router->map('GET','events', function () use ($controller){
        $controller->handleGetAll();
    });

    $router->map('GET','events/[i:id]', function ($id) use ($controller){
        $controller->handleGetById($id);
    });

    $match = $router->match();

    if( $match && is_callable( $match['target'] ) ){
        call_user_func_array( $match['target'], $match['params'] );
    }

} catch (Exception $ex){
    echo $ex->getMessage();
}