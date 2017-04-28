<?php

use Sphp\Stdlib\CsvFile;
use Sphp\Html\Foundation\Sites\Grids\BlockGrid;
use Sphp\Html\Foundation\Sites\Adapters\Equalizer;
use Sphp\MVC\PersonCalloutGenerator;

$csv = new CsvFile('yhteystiedot/hallitus.csv');
$blockGrid = new BlockGrid(1, false, 2);
$pcg = new PersonCalloutGenerator();
$equalizedRow = new Equalizer($blockGrid);

$arr = $csv->toArray();
unset($arr[0]);
//echo "<pre>\n";
foreach ($arr as $k => $data) {
  //echo "$k\n";
  $person = new Sphp\MVC\BoardMemberData($data);
  $callout[$k] = $pcg->setPersonData($person)->generate();
  $equalizedRow->addObserver($callout[$k]);
  $blockGrid->append($callout[$k]);
}
?>



#Hallitus 

<?php
echo $blockGrid;
?>