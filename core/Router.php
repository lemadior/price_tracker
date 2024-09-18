<?php

namespace Core;

class Router
{
    private $routes = [];

    public function add($uri, $controllerAction): void
    {
        $this->routes[$uri] = $controllerAction;
    }

    public function dispatch($uri): mixed
    {
        if (array_key_exists($uri, $this->routes)) {
            list($controller, $action) = explode('@', $this->routes[$uri]);

            $controller = "App\\Controllers\\{$controller}";
            $controllerInstance = new $controller();

            return $controllerInstance->$action();
        }

        http_response_code(404);
        echo "404 not found";

        return false;
    }
}
