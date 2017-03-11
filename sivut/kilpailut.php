#Raision veneseuran järjestämät kilpailut
<div class="row">
  <div class="column small-12 medium-6" markdown="1">
    
##Purjehduskilpailut
    
<?php

use Sphp\Stdlib\Path;

$root = 'sphp/viewerjs/#../../';
$sailing = new FilesystemIterator('sivut/kilpailut/purjehdus');

function formatBytes($size, $precision = 2) {
  $base = log($size, 1024);
  $suffixes = array('', 'K', 'M', 'G', 'T');

  return round(pow(1024, $base - floor($base)), $precision) . ' ' . $suffixes[floor($base)];
}
$arr = iterator_to_array($sailing);
//print_r($arr);
krsort($arr);
foreach ($arr as $item) {
  //print_r($item);
  if ($item->isFile()) {
    $name = $item->getBasename('.pdf');
    $filename = $item->getFilename();
    $extension = $item->getFileInfo()->getExtension();
    $size = formatBytes($item->getSize());
    $path = Path::get()->http();
    if ($extension === 'php') {
      $name = $item->getBasename('.php');
      $path .= '?page=sivut.kilpailut.purjehdus.' . $name;
      $linkText = '<span class="badge alert" title="HTML-sivu"><i class="fa fa-html5"></i></span> Vuosi ' . $name;
      $target = '_self';
    } else if ($extension === 'pdf') {
      $path .= $root . $item->getPathname();
      $target = '_blank';
      $linkText = '<span class="badge alert" title="PDF-tiedosto"><i class="fa fa-file-pdf-o"></i></span> Vuosi ' . $name;
    }
    $link = new \Sphp\Html\Navigation\Hyperlink($path, $linkText, $target);
    echo " $link ($size)\n\n";
  }
}
?>
</div>
  <div class="column small-12 medium-6" markdown="1">

##Kalastuskilpailut

<?php
$fishing = new FilesystemIterator('sivut/kilpailut/kalastus');
    $fishingArr = iterator_to_array($fishing);
//print_r($arr);
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
      $path .= '?page=sivut.kilpailut.kalastus.' . $name;
      $linkText = '<span class="badge alert" title="HTML-sivu"><i class="fa fa-html5"></i></span> Vuosi ' . $name;
      $target = '_self';
    } else if ($extension === 'pdf') {
      $path .= $root . 'dokumentit/jolla/' . $item->getPathname();
      $target = '_self';
      $linkText = '<span class="badge alert" title="PDF-tiedosto"><i class="fa fa-file-pdf-o"></i></span> Vuosi ' . $name;
    }
    $link = new \Sphp\Html\Navigation\Hyperlink($path, $linkText, $target);
    echo " $link\n\n";
  }
}
?>
    
  </div>
</div>
