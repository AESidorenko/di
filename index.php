<?php

use AES\DI\Container;
use AES\Example\LightMenuVariant;
use AES\Example\Menu;
use AES\Example\MenuItemsProviderInterface;

require_once __DIR__ . '/vendor/autoload.php';

$container = new Container();

$container->add(MenuItemsProviderInterface::class, LightMenuVariant::class);

$menu = $container->get(Menu::class);

$menu->show();