<?php

namespace Sphp\Html\Foundation\Sites\Navigation;
use Sphp\MVC\Router;

$menuBuilder = new MenuBuilder(new MenuLinkBuilder(Router::getCleanUrl()));
echo $menuBuilder->buildMenu($mainLinks, new DrilldownMenu());
