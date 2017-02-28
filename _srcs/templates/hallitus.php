<?php

namespace Sphp\Html\Tables;

use Sphp\Core\Path;
use Sphp\Stdlib\CsvFile;

$reader = new CsvFile(Path::get()->local('yhteystiedot/hallitus.csv'));
$hallitus = $reader->toArray();

$thallitus = new Table();
$thallitus->thead()->append(array_shift($hallitus));
foreach ($hallitus as $member) {
  $thallitus->tbody()->append($member);
}

$thallitus->printHtml();
