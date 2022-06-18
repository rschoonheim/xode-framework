<?php declare(strict_types=1);

namespace Framework\Services;

use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

abstract class AbstractContainer implements ContainerInterface
{
    private array $register = [];

    /**
     * Bind something to the service container.
     *
     * @param string $abstract
     * @param $concrete
     *
     * @return mixed
     */
    public function set(string $abstract, $concrete)
    {
        $this->register[$abstract] = $concrete;
    }

    /**
     * @inheritDoc
     */
    public function get(string $id)
    {
        if (!$this->has($id)) {
            //todo: throw exception.
        }

        return $this->register[$id];
    }

    /**
     * @inheritDoc
     */
    public function has(string $id): bool
    {
        return array_key_exists($id, $this->register);
    }
}