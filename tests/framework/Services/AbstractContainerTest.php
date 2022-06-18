<?php

namespace Tests\framework\Services;

use Framework\Services\AbstractContainer;
use Tests\TestCase;

class AbstractContainerTest extends TestCase
{
    /** @test */
    public function has_returns_false_when_container_does_not_have_given_id(): void
    {
        $container = new TestContainer();
        $this->assertFalse(
            $container->has('some_random_id')
        );
    }

    /** @test */
    public function has_returns_true_when_container_contains_given_id(): void
    {
        $containerId = 'awesome_service_id';

        $container = new TestContainer();

        $container->set($containerId, 123);

        $this->assertTrue(
            $container->has($containerId)
        );
    }

    /** @test */
    public function get_returns_value_registered_to_service_container_when_id_exists(): void
    {
        $containerId = 'awesome_service_id';

        $container = new TestContainer();

        $container->set($containerId, 123);
        $this->assertEquals(123, $container->get($containerId));
    }

}

class TestContainer extends AbstractContainer
{}