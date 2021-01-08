<?php

use App\DI\Container;
use App\Example\LightMenuVariant;
use App\Example\Menu;
use App\Example\MenuItemsProviderInterface;

require_once __DIR__ . '/vendor/autoload.php';

$container = new Container();

$container->add(MenuItemsProviderInterface::class, LightMenuVariant::class);
$container->add('$lang', 'EN');

$menu = $container->get(Menu::class);

$menu->show();