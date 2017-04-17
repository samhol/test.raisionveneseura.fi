<div class="sidenav">
<?php

use Sphp\MVC\SideNavViewer;
use Sphp\MVC\Router;

$sidenav = (new SideNavViewer($mainLinks, Router::getCleanUrl()))->printHtml();
?>
</div>