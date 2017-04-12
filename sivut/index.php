<?php

namespace Sphp\Html\Foundation\Sites\Media\Orbit;

use Sphp\Html\Media\Img;
use Sphp\Html\Foundation\Sites\Containers\ExceptionCallout;
try {
  $sailing = new \FilesystemIterator('kuvarulla');
  $arr = iterator_to_array($sailing);

  $o = new Orbit();
//$o->accessibility(false);
  $size = new \Sphp\Html\Media\Size(null, null);
  foreach ($arr as $img) {
    $o->appendFigure(Img::scaleToFit($img, $size));
  }
  $o->printHtml();
} catch (\Exception $ex) {
  (new ExceptionCallout($ex, true, true))->printHtml();
}
