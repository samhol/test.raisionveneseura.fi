<?php

namespace Sphp\Html\Tables;

<<<<<<< HEAD
use Sphp\Core\Path;
=======
use Sphp\Stdlib\Path;
>>>>>>> origin/master
use Sphp\Stdlib\CsvFile;

$reader = new CsvFile(Path::get()->local('yhteystiedot/katsastajat.csv'));
$hallitus = $reader->toArray();

$thallitus = new Table();
$thallitus->thead()->append(array_shift($hallitus));
foreach ($hallitus as $member) {
  $thallitus->tbody()->append($member);
}

$thallitus->printHtml();
