<?php

namespace Sphp\Html\Foundation\Sites\Navigation;
use Sphp\MVC\Router;
$dd = new AccordionMenu();
//$dd->setAttr('data-back-button', "<li class=\"js-drilldown-back\"><a tabindex=\"0\">Takaisin</a></li>");
$menuBuilder = new MenuBuilder(new MenuLinkBuilder(Router::getCleanUrl()));
echo $menuBuilder->buildMenu($mainLinks, $dd);
