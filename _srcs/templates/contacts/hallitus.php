<?php

namespace Sphp\Html\Tables;

use Sphp\Stdlib\Path;
use Sphp\Stdlib\CsvFile;

$reader = new CsvFile(Path::get()->local('yhteystiedot/hallitus.csv'), ',');
$hallitus = $reader->toArray();

$thallitus = new Table();
$thallitus->thead()->appendHeaderRow(array_shift($hallitus));
foreach ($hallitus as $member) {
  $taskarr = explode(', ', $member[0]);
  $tasks = implode(', <wbr>', $taskarr);
  $member[0] = $tasks;
  $thallitus->tbody()->appendBodyRow($member);
}

$thallitus->addCssClass('hover')->printHtml();
