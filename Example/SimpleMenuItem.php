<?php

namespace App\Example;

class SimpleMenuItem extends AbstractMenuItem
{
    /**
     * @var LoggerInterface
     */
    private LoggerInterface $logger;

    /**
     * SimpleMenuItem constructor.
     * @param string          $title
     * @param float           $price
     * @param LoggerInterface $logger
     */
    public function __construct(string $title, float $price, LoggerInterface $logger)
    {
        parent::__construct($title, $price);

        $this->logger = $logger;

        $this->logger->log('Simple menu item created');
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