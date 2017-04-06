<?php
use Sphp\Html\Tables\TableBuilder;
use Sphp\Stdlib\CsvFile;

$csvTaulu = function($polku) {
  echo TableBuilder::fromCsvFile(new CsvFile($polku));
};
