#Tiedotteet
<?php
$it = new FilesystemIterator('sivut/ilmoitukset');
$arr = iterator_to_array($it);
$cal = new Sphp\Core\I18n\Calendar(new \Sphp\Core\I18n\Gettext\Translator());
krsort($arr);
foreach ($arr as $item) {
  //print_r($item);
  if ($item->isFile()) {

    $extension = $item->getFileInfo()->getExtension();
    $mtime = date('d.m.Y \k\e\l\l\o h:i:s', $item->getFileInfo()->getMTime());
    $month = $cal->getMonthName((int) date('m', $item->getFileInfo()->getMTime()));
    var_dump($item->getFileInfo()->getMTime());
    //echo setlocale(LC_MESSAGES, '0');
    if ($extension === 'php') {
      $c = new Sphp\Html\Foundation\Sites\Containers\Callout();
      $c->append('<div class="date"><b>Lisätty:</b> ' . $mtime .$month. '</div>');
      $c->appendMdFile($item->getPathname());
      $c->addCssClass('note');
    }
    echo $c;
  }
}
