<?php

namespace Sphp\MVC;

use FilesystemIterator;
use SplFileInfo;

$files = iterator_to_array(new FilesystemIterator('sivut/kilpailut/purjehdus'));
krsort($files);
$gen = new LinkListGenerator($files);
$gen->getLinkGen()->setDisplayName(function(SplFileInfo $file) {
  $year = $file->getBasename('.' . $file->getExtension());
  return "Vuosi $year";
});
$gen->getLinkGen()->setUrlPath('kilpailut/purjehdus/');
echo $gen;
