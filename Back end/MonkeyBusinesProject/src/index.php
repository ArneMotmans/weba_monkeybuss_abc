<?php

require_once "../vendor/autoload.php";
require_once "routing/AltoRouter.php";

use model\repositories\eventRepository;
use model\entities\connectionBuilder;
use view\eventView;
use controller\eventController;
use routing\AltoRouter;

$repository = new eventRepository(connectionBuilder::build());
$view = new eventView();
$controller = new eventController($repository,$view);

$router = new AltoRouter();
$router->setBasePath('/');

$router->map('GET', '/events', function () use ($controller){
    $controller->handleGetAll();
});

$match = $router->match();

if ($match && is_callable($match)){
    call_user_func($match);
}