#Tiedotteet
<?php
$it = new FilesystemIterator('sivut/ilmoitukset');
$arr = iterator_to_array($it);

krsort($arr);
foreach ($arr as $item) {
  //print_r($item);
  if ($item->isFile()) {
    $name = $item->getBasename('.pdf');
    $filename = $item->getFilename();
    $extension = $item->getFileInfo()->getExtension();
    $size = 0;
    $path = Path::get()->http();
    if ($extension === 'php') {
      $name = $item->getBasename('.php');
      $path .= 'kilpailut/purjehdus/' . $name;
      $linkText = '<span class="badge alert" title="HTML-sivu"><i class="fa fa-html5"></i></span> Vuosi ' . $name;
      $target = '_self';
    } else if ($extension === 'pdf') {
      $path .= $root . $item->getPathname();
      $target = '_blank';
      $linkText = '<span class="badge alert" title="PDF-tiedosto"><i class="fa fa-file-pdf-o"></i></span> Vuosi ' . $name;
    }
    $link = new Hyperlink($path, $linkText, $target);
    echo " $link ($size)\n\n";
  }
}
