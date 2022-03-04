<?php

class Routeur
{

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

    public static function route() {
        $controllerStr = self::getParam('c', 'home');
        $action = self::getParam('a');

        $controller = self::guessController($controllerStr);

        if ($controller instanceof ErrorController) {
            $controller->error404($controllerStr);
            exit();
        }

        $action = self::guessMethod($controller, $action);
        null === $action ? $controller->index() : $controller->$action();
    }

    /**
     * @param string $c
     * @return ErrorController|mixed
     */
    private static function guessController(string $c) {
        $controller = ucfirst($c) . 'Controller';
        if (class_exists($controller)) {
            return new $controller();
        }
        return new ErrorController();
    }


    private static function guessMethod(\App\Controller\AbstractController $controller, ?string $action) {
        if (strpos($action, '-') !== -1) {
            $action = array_reduce(explode('-', $action), function ($ac, $a) {
                return $ac . ucfirst($a);
            });
        }
        $action = lcfirst($action);
        if (method_exists($controller, $action)) {
            return $action;
        }
        return null;
    }


    /**
     * @param string $key
     * @param null $default
     * @return string|null
     */
    private static function getParam(string $key, $default = null): ?string {
        if (isset($_GET[$key])) {
            return filter_var($_GET[$key], FILTER_SANITIZE_STRING);
        }

        return $default;
    }


    /*
    private static function guessMethod (object $controller, string $method)
    {
        if (method_exists($controller, $method)) {
            return $method;
        }
    }

    public static function root (): void
    {
        $controllerStr = self::getParam('c', 'home');
        $method = self::getParam('m');

        $controller = self::guessController($controllerStr);
        $method = self::guessMethod($controller, $method);

        if ($controller instanceof ErrorController) {
            $controller->error404($controllerStr);
            exit();
        }
        else {
            $controller->$method();
            exit();
        }
    }
    */

}