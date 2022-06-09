<?php declare(strict_types=1);

namespace Framework\Routing;

use Framework\Routing\Exceptions\ControllerActionNotFoundException;

class RouteDispatcher
{
    /**
     * Dispatch request to given route.
     *
     * @param Route $route
     * @return void
     *
     * @throws ControllerActionNotFoundException
     */
    public function dispatch(Route $route)
    {
        if (!method_exists($route->getController(), $route->getMethod())) {
            throw new ControllerActionNotFoundException(
                "Could not find method {$route->getMethod()} on controller {$route->getController()}"
            );
        }

        $controller = $route->getController();

        return (new $controller())->{$route->getMethod()}();
    }
}