<?php declare(strict_types=1);

namespace Tests\framework\Routing;

use Framework\Routing\Exceptions\ControllerActionNotFoundException;
use Framework\Routing\Route;
use Framework\Routing\RouteDispatcher;
use Tests\TestCase;

class RouteDispatcherTest extends TestCase
{
    /** @test */
    public function php_can_create_instance_of_route_dispatcher(): void
    {
        $this->assertInstanceOf(
            RouteDispatcher::class,
            new RouteDispatcher()
        );
    }

    /** @test */
    public function dispatch_throws_action_not_found_when_defined_action_was_not_found_on_controller(): void
    {
        $this->expectException(
            ControllerActionNotFoundException::class
        );
        $this->expectExceptionMessage(
            "Could not find method someMethod on controller Tests\\framework\\Routing\\TestController"
        );

        $route = new Route(
            TestController::class,
            'someMethod'
        );
        $dispatcher = new RouteDispatcher();

        $dispatcher->dispatch($route);
    }

    /** @test */
    public function dispatch_dispatches_action_when_action_was_found_on_the_controller(): void
    {
        $route = new Route(
            TestController::class,
            'action'
        );
        $dispatcher = new RouteDispatcher();
        $result = $dispatcher->dispatch($route);

        $this->assertIsInt($result);
        $this->assertEquals(123, $result);
    }
}

class TestController {

    public function action(): int
    {
        return 123;
    }

}