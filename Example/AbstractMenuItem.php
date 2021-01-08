<?php

namespace App\Example;

abstract class AbstractMenuItem
{
    protected string $title;
    protected float  $price;

    /**
     * SimpleMenuItem constructor.
     * @param string $title
     * @param float  $price
     */
    public function __construct(string $title, float $price)
    {
        $this->title = $title;
        $this->price = $price;
    }

    /**
     * @return string
     */
    abstract public function getTitle(): string;

    /**
     * @return float
     */
    abstract public function getPrice(): float;
}