<?php

namespace Sphp\Html\Foundation\Sites\Navigation;

$menuBuilder = new MenuBuilder();
echo $menuBuilder->buildMenu($mainLinks, new DrilldownMenu())->addCssClass('vertical');
