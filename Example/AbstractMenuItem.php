<?php

namespace App\Example;

abstract class AbstractMenuItem
{
    protected string $title;
    protected float  $price;

    /**
     * @return string
     */
    abstract public function getTitle(): string;

    /**
     * @return float
     */
    abstract public function getPrice(): float;
}