<?php

namespace App\DI\Exception;

class DuplicatedKeyException extends ContainerException
{

    /**
     * DuplicatedKeyException constructor.
     * @param string $key
     */
    public function __construct(string $key)
    {
        $message = sprintf('Duplicated key %s', $key);

        parent::__construct($message);
    }
}