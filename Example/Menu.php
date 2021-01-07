<?php

namespace App\Example;

class Menu
{
    /**
     * @var MenuItemsProviderInterface
     */
    private MenuItemsProviderInterface $itemsProvider;

    /**
     * Menu constructor.
     * @param MenuItemsProviderInterface $itemsProvider
     */
    public function __construct(MenuItemsProviderInterface $itemsProvider)
    {
        $this->itemsProvider = $itemsProvider;
    }

    public function show()
    {
    }
}