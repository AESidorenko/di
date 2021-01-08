<?php

namespace App\Example;

class SimpleMenuItem extends AbstractMenuItem
{

    public function getTitle(): string
    {
        return sprintf(ucfirst(strtolower($this->title)));
    }

    public function getPrice(): float
    {
        return round($this->price, 2);
    }
}