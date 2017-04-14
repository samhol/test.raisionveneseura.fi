<?php

namespace Sphp\MVC;

use FilesystemIterator;

$files = iterator_to_array(new FilesystemIterator('sivut/kilpailut/kalastus'));
krsort($files);
$gen = new LinkListGenerator($files);
$gen->getLinkGen()->setUrlPath('kilpailut/kalastus/');
echo $gen;
