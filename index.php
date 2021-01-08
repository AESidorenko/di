<?php

use App\DI\Container;
use App\Example\LightMenuVariant;
use App\Example\LoggerInterface;
use App\Example\Menu;
use App\Example\MenuItemsProviderInterface;
use App\Example\SimpleFileLogger;

require_once __DIR__ . '/vendor/autoload.php';

$container = new Container();

// add an existing object
$container->add(LoggerInterface::class, new SimpleFileLogger());

// add an interface implementing instance
$container->add(MenuItemsProviderInterface::class, LightMenuVariant::class);

// add a variable of built-in class
$container->add('$lang', 'EN');

// automatically create a class instance
$menu = $container->get(Menu::class);

$menu->show();