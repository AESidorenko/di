<?php

require_once __DIR__ . '/vendor/autoload.php';

<<<<<<< HEAD
=======
$container = new \AES\DI\Container();

$menu = $container->get('\AES\Example\Menu');

$menu->add(new \AES\Example\MenuItemTypeA());
$menu->add(new \AES\Example\MenuItemTypeB());

$menu->show();
>>>>>>> feature/add_example_code
