<?php

namespace App\Example;

use Iterator;

interface MenuItemsProviderInterface
{
    function getItems(): Iterator;
}