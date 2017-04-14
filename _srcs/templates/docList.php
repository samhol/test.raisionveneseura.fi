
#Ladattavat dokumentit

**Huom.** Jolla-lehdet ja muut PDF-sokumentit avautuvat uuteen välilehteen. Näiden dokumenttien avautuminen saattaa kestää pienen hetken, joten odota rauhassa.

##Säännöt ohjeet ja työkalut

<?php
$root = 'sphp/viewerjs/#../../';

function formatBytes($size, $precision = 2) {
  $base = log($size, 1024);
  $suffixes = array('', 'K', 'M', 'G', 'T');

  return round(pow(1024, $base - floor($base)), $precision) . ' ' . $suffixes[floor($base)];
}

$saannot = new SplFileInfo('dokumentit/RVS-saannot.pdf');
$filename = $saannot->getFilename();
$size = formatBytes($saannot->getSize());
$link = new \Sphp\Html\Navigation\Hyperlink($root . 'dokumentit/RVS-saannot.pdf', '<span class="badge alert" title="PDF-tiedosto"><i class="fa fa-file-pdf-o"></i></span> Raision veneseuran säännöt', $filename);
echo " * $link ($size)\n";

$turvallisuus = new SplFileInfo('dokumentit/turvallisuusasiaa.pdf');
$filename = $turvallisuus->getFilename();
$size = formatBytes($turvallisuus->getSize());
$link = new \Sphp\Html\Navigation\Hyperlink($root . 'dokumentit/turvallisuusasiaa.pdf', '<span class="badge alert" title="PDF-tiedosto"><i class="fa fa-file-pdf-o"></i></span> Tietoa veneturvallisuudesta', $filename);
echo " * $link ($size)\n";
?>
<?php
$eksymalaskenta = new \SplFileInfo('dokumentit/eksymalaskenta.xls');
$filename = $eksymalaskenta->getFilename();
$size = formatBytes($eksymalaskenta->getSize());
$link = new \Sphp\Html\Navigation\Hyperlink('dokumentit/eksymalaskenta.xls', '<span class="badge" title="XLS-tiedosto"><i class="fa fa-file-excel-o "></i></span> Eksymälaskenta');
echo " * $link ($size)\n";
?>

##Jolla-lehdet

<?php

use Sphp\MVC\LinkListGenerator;

$files = iterator_to_array(new FilesystemIterator('dokumentit/jolla'));
krsort($files);
$gen = new LinkListGenerator($files);
$gen->getLinkGen()->setUrlPath('dokumentit/jolla/');
echo $gen;

?>
