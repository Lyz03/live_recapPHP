<?php

require __DIR__ . '/../includes.php';

Routeur::route();


/*
switch($controller) {
    case 'user':
        $controller = new UserController();
        $controller->usersList();
        break;
    default:
        (new ErrorController())->error404($controller);
}
*/

