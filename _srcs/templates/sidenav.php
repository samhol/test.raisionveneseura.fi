<?php

namespace Sphp\MVC;

$sidenav = (new SideNavViewer($mainLinks, Router::getCleanUrl()))->printHtml();
