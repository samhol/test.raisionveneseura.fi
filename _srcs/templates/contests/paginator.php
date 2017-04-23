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
    $years[$basename] = 'kilpailut/kalastus/' . $file->getBasename('.' . $file->getExtension());
  }
  return $years;
}

$array = parseYears($files);
//print_r($array);
//var_dump(current(Arrays::pointToKey($array, 2015)));
//var_dump(current(Arrays::pointToKey($array, 2012)));
try {
  $paginator = new Pagination();
  $paginator->setPages($array);
  $paginator->getPreviousPageButton()->setContent('Edellinen vuosi');
  $paginator->getNextPageButton()->setContent('Seuraava vuosi');
  $paginator->getPage(2014)->disable();
  $paginator->visibleBeforeCurrent(3)->visibleAfterCurrent(3)->setCurrent(2016)->setTarget('_self')->printHtml();
  throw new \Exception();
} catch (\Exception $ex) {
  (new \Sphp\Html\Foundation\Sites\Containers\ExceptionCallout($ex))->showInitialFile()->showPreviousException()->showTrace()->printHtml();
}
