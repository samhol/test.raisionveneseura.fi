<?php

define('HALLITUS', __DIR__ . '/templates/hallitus.php');
define('KATSASTAJAT', __DIR__ . '/templates/katsastajat.php');
define('KUVAT', __DIR__ . '/templates/imageOrbit.php');

use Sphp\Html\Navigation\Hyperlink;
use Sphp\Stdlib\Path;
$kilpailut = (new Hyperlink(Path::get()->http() . 'kilpailut', 'Takaisin kilpailuvalikkoon', '_self'))->getHtml();

define('TAKAISIN_KILPAILUVALIKKOON', $kilpailut);

const TOIMISTO_EMAIL = 'toimisto@raisionveneseura.fi';