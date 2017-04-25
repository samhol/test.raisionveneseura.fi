
#Ladattavat dokumentit

**Huom.** Jolla-lehdet ja muut PDF-sokumentit avautuvat uuteen välilehteen. Näiden 
dokumenttien avautuminen saattaa kestää pienen hetken, joten odota rauhassa.

##Säännöt ohjeet ja työkalut

<?php

use Sphp\MVC\FileLinkGenerator;

$flg = new FileLinkGenerator();
$flg->setFile(new \SplFileInfo('dokumentit/turvallisuusasiaa.pdf'));
$flg->setDisplayName('Raision veneseuran säännöt');
echo " * " . $flg->buildLink() . "\n";

$flg->setFile(new \SplFileInfo('dokumentit/turvallisuusasiaa.pdf'));
$flg->setDisplayName('Tietoa veneturvallisuudesta');
echo " * " . $flg->buildLink() . "\n";

$flg->setFile(new \SplFileInfo('dokumentit/eksymalaskenta.xls'));
$flg->setDisplayName('Eksymälaskenta');
echo " * " . $flg->buildLink() . "\n";

?>

##Jolla-lehdet

<?php

use Sphp\MVC\LinkListGenerator;


$files = iterator_to_array(new FilesystemIterator('dokumentit/jolla'));
krsort($files);
$gen = new LinkListGenerator($files);
$gen->getLinkGen()->setDisplayName(function(SplFileInfo $file) {
  $year = $file->getBasename('.' . $file->getExtension());
  return "Vuosi $year";
});
$gen->getLinkGen();//->setUrlPath('dokumentit/jolla/');
echo "$gen\n";

