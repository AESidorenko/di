<?php
declare(strict_types=1);

namespace App\DI;

use App\DI\Exception\CannotGuessAutowiringException;
use App\DI\Exception\DuplicatedKeyException;
use ReflectionClass;

class Container
{
    private const TARGET_TYPE_CLASS  = 'tt_class';
    private const TARGET_TYPE_OBJECT = 'tt_object';
    private const TARGET_TYPE_VALUE  = 'tt_value';

    private array $items = [];

    public function add(string $key, $target = null): void
    {
        if (array_key_exists('key', $this->items)) {
            throw new DuplicatedKeyException($key);
        }

        $target ??= $key;

        $targetType = self::detectTargetType($target);
        switch ($targetType) {
            case self::TARGET_TYPE_CLASS:
                $this->items[$key] = $this->createInstance($target);

                return;

            default:
                $this->items[$key] = $target;

                return;
        }
    }

    public function get(string $key)
    {
        if (array_key_exists($key, $this->items)) {
            return $this->items[$key];
        }

        $this->add($key);

        return $this->items[$key];
    }

    private static function detectTargetType($target): string
    {
        switch (true) {
            case is_object($target):
                return self::TARGET_TYPE_OBJECT;

            case (is_string($target) && class_exists($target)):
                return self::TARGET_TYPE_CLASS;

            default:
                return self::TARGET_TYPE_VALUE;
        }
    }

    private function createInstance(string $target): object
    {
        $class = new ReflectionClass($target);

        $constructor = $class->getConstructor();
        if ($constructor === null) {
            return $class->newInstanceWithoutConstructor();
        }

        $instanceArgs = [];
        $args         = $constructor->getParameters();
        foreach ($args as $arg) {
            if (!$arg->hasType() || $arg->getType()->isBuiltin()) {
                $key = '$' . $arg->getName();
                if (!array_key_exists($key, $this->items)) {
                    throw new CannotGuessAutowiringException($key);
                }
                $instanceArgs[] = $this->items[$key];

                continue;
            }

            $key = $arg->getClass()->getName();
            if (!array_key_exists($key, $this->items)) {
                $instanceArgs[] = $this->createInstance($key);

                continue;
            }

            $instanceArgs[] = $this->items[$key];
        }

        return $class->newInstanceArgs($instanceArgs);
    }
}