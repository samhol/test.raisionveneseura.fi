<?php

namespace Sphp\Html\Foundation\Sites\Navigation;

use Sphp\MVC\Router;

$dd = new AccordionMenu();
$menuBuilder = new MenuBuilder(new MenuLinkBuilder(Router::getCleanUrl()));
echo $menuBuilder->buildMenu($mainLinks, $dd);
