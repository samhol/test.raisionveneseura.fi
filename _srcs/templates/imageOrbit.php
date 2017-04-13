<?php

namespace Sphp\Html\Foundation\Sites\Media\Orbit;

use Sphp\Html\Media\Img;
use Sphp\Html\Foundation\Sites\Containers\ExceptionCallout;

try {
  $sailing = new \FilesystemIterator('kuvat/etusivu');

  $o = new Orbit();
  $o->accessibility(false)->setTimerDelay(7000)
          ->showBullets(false)
          ->autoplay(true);
  foreach ($sailing as $img) {
    if ($img->getFileInfo()->getExtension() === 'jpg') {
      $o->append((new Img("$img")));
    }
  }
  $o->printHtml();
} catch (\Exception $ex) {
  (new ExceptionCallout($ex, true, true))->printHtml();
}
