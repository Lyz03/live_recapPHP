<?php

class ErrorController
{

    public function error404($controller) {
        require __DIR__ . '/../View/404.php';
    }
}