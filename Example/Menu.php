<?php

namespace App\Example;

class Menu
{
    private array  $items = [];
    private string $lang;

    /**
     * @var LoggerInterface
     */
    private LoggerInterface $logger;

    /**
     * Menu constructor.
     * @param MenuItemsProviderInterface $itemsProvider
     * @param string                     $lang
     * @param LoggerInterface            $logger
     */
    public function __construct(MenuItemsProviderInterface $itemsProvider, string $lang, LoggerInterface $logger)
    {
        /** @var AbstractMenuItem $item */
        foreach ($itemsProvider->getItems() as $item) {
            $this->items[] = sprintf('%s, $%.2f', $item->getTitle(), $item->getPrice());
        }

        $this->lang   = $lang;
        $this->logger = $logger;

        $logger->log('Menu instance created');
    }

    public function show()
    {
        echo "Menu language: $this->lang" . PHP_EOL;

        foreach ($this->items as $item) {
            echo $item . PHP_EOL;
        }
    }
}