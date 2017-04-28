<?php

namespace Sphp\Html\Tables;

use Sphp\Stdlib\Path;
use Sphp\Stdlib\CsvFile;

$reader = new CsvFile(Path::get()->local('yhteystiedot/katsastajat.csv'), ';');
$hallitus = $reader->toArray();

$thallitus = new Table();
$thallitus->thead()->appendHeaderRow(array_shift($hallitus));
foreach ($hallitus as $member) {
  $thallitus->tbody()->appendBodyRow($member);
}

//$thallitus->addCssClass('contacts')->printHtml();

TableBuilder::fromCsvFile(new CsvFile('yhteystiedot/katsastajat.csv', ';'))
        ->setLineNumbers(1, 'none')
        ->buildTable()
        ->addCssClass('hover')
        ->printHtml();
echo 'heahehaehe';
echo $a;
