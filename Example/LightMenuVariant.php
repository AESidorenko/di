<?php

namespace App\Example;

use Iterator;

class LightMenuVariant implements MenuItemsProviderInterface
{
    private array $menuItemTitles = [
        'tea',
        'coffee',
        'apple juice',
        'mint yoghurt'
    ];

    public function getItems(): Iterator
    {
        foreach ($this->menuItemTitles as $itemTitle) {
            yield new SimpleMenuItem($itemTitle, rand(1000, 9900) / 100);
        }
    }
}