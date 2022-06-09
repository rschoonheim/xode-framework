<?php declare(strict_types=1);

namespace Framework\Routing;

class Route
{
    private string $controller;

    private string $method;

    public function __construct(string $controller, string $method)
    {
        $this->controller = $controller;
        $this->method = $method;
    }

    public function getController(): string
    {
        return $this->controller;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

}