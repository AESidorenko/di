<?php

require_once __DIR__ . '/vendor/autoload.php';

$container = new \AES\DI\Container();

$menu = $container->get('\AES\Example\Menu');

$menu->show();