<?php

namespace App\DI\Exception;

class CannotGuessAutowiringException extends ContainerException
{

    /**
     * CannotGuessAutowiringException constructor.
     * @param string $key
     */
    public function __construct(string $key)
    {
        $message = sprintf('Cannot guess type/class for autowiring: %s', $key);

        parent::__construct($message);
    }
}