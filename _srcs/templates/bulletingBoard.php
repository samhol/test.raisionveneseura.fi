#Tiedotteet

<?php

use Sphp\I18n\Gettext\Translator;
use Sphp\I18n\CalendarDate;
$it = new FilesystemIterator('sivut/ilmoitukset');
//print_r($it);
$translator = new Translator();
$translator->setLang('fi_FI');
$arr = iterator_to_array($it);
$cal = new Sphp\I18n\Calendar($translator);
krsort($arr);
foreach ($arr as $item) {
  if ($item->isFile()) {
    $extension = $item->getFileInfo()->getExtension();
    $t = CalendarDate::fromTimestamp($item->getFileInfo()->getMTime(), $translator);
    $mtime = date('d.m.Y \k\e\l\l\o h:i:s', $item->getFileInfo()->getMTime());
    $cal = new Sphp\I18n\Calendar();
    $month = $cal->getMonthName((int) date('m', $item->getFileInfo()->getMTime()));
    //var_dump($item->getFileInfo()->getMTime());
    //echo setlocale(LC_MESSAGES, '0');
    if ($extension === 'php') {
      $c = new Sphp\Html\Foundation\Sites\Containers\Callout();
      $c->appendMdFile($item->getPathname());
      $c->append('<div class="date text-right"><b>Lisätty: </b>' . $t->getFiDate() . "</div>");
      $c->addCssClass('note');
    }
    echo "$c\n";
  }
}
?>