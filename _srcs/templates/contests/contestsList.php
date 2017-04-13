<?php

use Sphp\Stdlib\Path;
use Sphp\Html\Lists\Ul;

function formatBytes($size, $precision = 2) {
  $base = log($size, 1024);
  $suffixes = array('', 'K', 'M', 'G', 'T');

  return round(pow(1024, $base - floor($base)), $precision) . ' ' . $suffixes[floor($base)];
}

$fileList = new FilesystemIterator('sivut/kilpailut/purjehdus');


$ul = new Ul();
$arr = iterator_to_array($fileList);
//print_r($arr);
krsort($arr);
$path = Path::get()->http();
foreach ($arr as $item) {
  //print_r($item);
  if ($item->isFile()) {
    $extension = $item->getFileInfo()->getExtension();
    if ($extension === 'php') {
      $name = $item->getBasename('.php');
      $path .= 'kilpailut/purjehdus/' . $name;
      $linkText = '<span class="badge alert" title="HTML-sivu"><i class="fa fa-html5"></i></span> Vuosi ' . $name;
      //$target = '_self';
      // $link = new Hyperlink($path, $linkText, $target);

      $ul->appendLink($path, $linkText, '_self');
      //echo " $link\n\n";
    } else if ($extension === 'pdf') {
      $name = $item->getBasename('.pdf');
      $path .= $root . $item->getPathname();
      $target = '_blank';
      $size = formatBytes($item->getSize());
      $linkText = '<span class="badge alert" title="PDF-tiedosto"><i class="fa fa-file-pdf-o"></i></span> Vuosi ' . $name;
      $linkText .= " <small>($size)</small>";
      //$link = new Hyperlink($path, $linkText, $target);
      //echo " $link ($size)\n\n";

      $ul->appendLink($path, $linkText, '_blank');
    }
  }
}
$ul->addCssClass('no-bullet')->printHtml();
