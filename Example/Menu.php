<?php

namespace App\Example;

class Menu
{
    private array  $items = [];
    private string $lang;

    /**
     * Menu constructor.
     * @param MenuItemsProviderInterface $itemsProvider
     * @param string                     $lang
     */
    public function __construct(MenuItemsProviderInterface $itemsProvider, string $lang)
    {
        /** @var AbstractMenuItem $item */
        foreach ($itemsProvider->getItems() as $item) {
            $this->items[] = sprintf('%s, $%.2f', $item->getTitle(), $item->getPrice());
        }

        $this->lang = $lang;
    }

    public function show()
    {
        echo "Menu language: $this->lang" . PHP_EOL;

        foreach ($this->items as $item) {
            echo $item . PHP_EOL;
        }
    }
}