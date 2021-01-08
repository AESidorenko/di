<?php

namespace App\Example;

interface LoggerInterface
{
    function log(string $message, array $context = []);

    function error(string $message, array $context = []);
}