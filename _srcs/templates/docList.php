
#Ladattavat dokumentit

**Huom.** Jolla-lehdet ja muut PDF-sokumentit avautuvat uuteen välilehteen. Näiden 
dokumenttien avautuminen saattaa kestää pienen hetken, joten odota rauhassa.

##Säännöt ohjeet ja työkalut

<?php

use Sphp\MVC\Filesystem\HyperlinkGenerator;

$flg = new HyperlinkGenerator();
$flg->setFile(new \SplFileInfo('dokumentit/RVS-saannot.pdf'));
$flg->setDisplayName('Raision veneseuran säännöt');
echo " * " . $flg->generate() . "\n";

$flg->setFile(new \SplFileInfo('dokumentit/turvallisuusasiaa.pdf'));
$flg->setDisplayName('Tietoa veneturvallisuudesta');
echo " * " . $flg->generate() . "\n";

$flg->setFile(new \SplFileInfo('dokumentit/eksymalaskenta.xls'));
$flg->setDisplayName('Eksymälaskenta');
echo " * " . $flg->generate() . "\n";

?>

##Jolla-lehdet

<?php
use Sphp\MVC\Filesystem\LinkListGenerator;

$gen = new LinkListGenerator();
$gen->getFileParser()->setSortingOrder(\SCANDIR_SORT_DESCENDING);
$gen->loadFiles('dokumentit/jolla');
$gen->getLinkGen()->setDisplayName(function(SplFileInfo $file) {
  $year = $file->getBasename('.' . $file->getExtension());
  return "Vuosi $year";
});

echo "$gen\n";
