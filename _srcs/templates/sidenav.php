<?php

namespace Sphp\Html\Foundation\Sites\Navigation;

$nav = new AccordionMenu();
$nav->addCssClass('sidenav');
$menuBuilder = new MenuBuilder();
echo $menuBuilder->buildMenu($mainLinks, $nav);
