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
    /**
     * @var LoggerInterface
     */
    private LoggerInterface $logger;

    /**
     * LightMenuVariant constructor.
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;

        $this->logger->log('LightMenuVariant created');
    }

    public function getItems(): Iterator
    {
        foreach ($this->menuItemTitles as $itemTitle) {
            yield new SimpleMenuItem($itemTitle, rand(1000, 9900) / 100, $this->logger);
        }
    }
}