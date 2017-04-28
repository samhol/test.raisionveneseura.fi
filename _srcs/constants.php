<?php

define('HALLITUS', __DIR__ . '/templates/contacts/hallitus.php');
define('KATSASTAJAT', __DIR__ . '/templates/contacts/katsastajat.php');
define('KUVAT', __DIR__ . '/templates/imageOrbit.php');

use Sphp\Html\Navigation\Hyperlink;
use Sphp\Stdlib\Path;

$kilpailut = "\n";
$kilpailut .= (new Hyperlink(Path::get()->http() . 'kilpailut', 'Takaisin kilpailuvalikkoon', '_self'))->getHtml();
$kilpailut .= "\n";
define('TAKAISIN_KILPAILUVALIKKOON', $kilpailut);

const TOIMISTO_EMAIL = 'toimisto@raisionveneseura.fi';
