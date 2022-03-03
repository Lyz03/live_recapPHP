<?php

class Routeur
{

    public static function route() {
        $controllerStr = self::getParam('c', 'home');
        $action = self::getParam('a');

        $controller = self::guessController($controllerStr);

        if ($controller instanceof ErrorController) {
            $controller->error404($controllerStr);
            exit();
        }
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

}