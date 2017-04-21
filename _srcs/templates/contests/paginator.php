<?php

namespace Sphp\Html\Foundation\Sites\Navigation\Pagination;

use FilesystemIterator;
use Sphp\Stdlib\Arrays;
$files = iterator_to_array(new FilesystemIterator('sivut/kilpailut/kalastus'));
ksort($files);

function parseYears($files) {
  $years = [];
  foreach ($files as $file) {
    $basename = $file->getBasename('.' . $file->getExtension());
    $years[$basename] = 'kilpailut/kalastus/' . $file->getBasename('.' . $file->getExtension()) . '.html';
  }
  return $years;
}
$array = parseYears($files);
print_r($array);
var_dump(current(Arrays::pointToKey($array, 2015)));
var_dump(current(Arrays::pointToKey($array, 2012)));
$paginator = new Pagination($array);

$paginator->setRange(8)->setTarget('_self')->printHtml();
