<?php

use Sphp\Stdlib\Path;
use Sphp\Html\Navigation\Hyperlink;
use Sphp\Html\Lists\Ul;



$fishing = new FilesystemIterator('sivut/kilpailut/kalastus');
$fishingArr = iterator_to_array($fishing);
//print_r($arr);
$ul = new Ul();
krsort($fishingArr);
foreach ($fishingArr as $item) {
  //print_r($item);
  if ($item->isFile()) {
    $name = $item->getBasename('.pdf');
    $filename = $item->getFilename();
    $extension = $item->getFileInfo()->getExtension();
    $size = formatBytes($item->getSize());
    $path = Path::get()->http();
    if ($extension === 'php') {
      $name = $item->getBasename('.php');
      $path .= 'kilpailut/kalastus/' . $name;
      $linkText = '<span class="badge alert" title="HTML-sivu"><i class="fa fa-html5"></i></span> Vuosi ' . $name;
      $target = '_self';
      $link = new Hyperlink($path, $linkText, $target);
      //echo " $link\n\n";
      $ul->appendLink($path, $linkText, '_self');
    }
  }
}
$ul->addCssClass('no-bullet')->printHtml();