<?php

namespace App\Example;

class SimpleMenuItem extends AbstractMenuItem
{

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

    public function getTitle(): string
    {
        return sprintf(ucfirst(strtolower($this->title)));
    }

    public function getPrice(): float
    {
        return round($this->price, 2);
    }
}