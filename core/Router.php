<?php

namespace Core;

use Core\Services\RouterService;

class Router
{
    protected RouterService $routerService;
    public function __construct()
    {
        $this->routerService = new RouterService();
    }

    private $routes = [];

    public function add(string $uri, array|string $controllerAction): void
    {
        $this->routes[$uri] = $controllerAction;
    }

    public function dispatch($uri): mixed
    {
        if (array_key_exists($uri, $this->routes)) {
            $route = is_array($this->routes[$uri])
                ? $this->routes[$uri]
                : $route = explode('@', $this->routes[$uri]);

            $action = !empty($route[1]) ? $route[1] : null;

            $controller = $this->routerService->getControllerPath($route[0]);

            $controllerInstance = new $controller();

            return $action ? $controllerInstance->$action() : $controllerInstance();
        }

        http_response_code(404);
        echo "404 not found";

        return false;
    }
}
