<?php

namespace Sphp\MVC\Filesystem;

use SplFileInfo;

$gen = new LinkListGenerator();
$gen->loadFiles('sivut/kilpailut/kalastus');
$gen->getLinkGen()->setDisplayName(function(SplFileInfo $file) {
  $year = $file->getBasename('.' . $file->getExtension());
  return "Vuosi $year";
});
$gen->getLinkGen();
echo $gen;
