<?php

namespace App\Example;

class Menu
{
    private array $items = [];

    /**
     * Menu constructor.
     * @param MenuItemsProviderInterface $itemsProvider
     */
    public function __construct(MenuItemsProviderInterface $itemsProvider)
    {
        /** @var AbstractMenuItem $item */
        foreach ($itemsProvider->getItems() as $item) {
            $this->items[] = sprintf('%s, $%.2f', $item->getTitle(), $item->getPrice());
        }
    }

    public function show()
    {
        foreach ($this->items as $item) {
            echo $item . PHP_EOL;
        }
    }
}