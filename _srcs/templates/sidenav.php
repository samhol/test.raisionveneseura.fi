<?php

namespace Sphp\MVC;

$sidenav = (new SideNavViewer($mainLinks, filter_input(INPUT_GET, 'page', FILTER_SANITIZE_STRING)))->printHtml();
