#Hakemaasi Sivua ei löytynyt

Raision veneseuran sivuista ei löytynyt hakemaasi resurssia.

##Voit kokeilla esimerkiksi seuraavia:

Etusivu; 
<?php
$urls = array();

$DomDocument = new DOMDocument();
$DomDocument->preserveWhiteSpace = false;
$DomDocument->load('sitemap.xml');
$DomNodeList = $DomDocument->getElementsByTagName('loc');
$urlNodes = $DomDocument->getElementsByTagName('url');
$queue = new Sphp\Stdlib\Datastructures\StablePriorityQueue();
foreach ($urlNodes as $k=>$urlNode) {
  foreach ($urlNode as $v) {
    if ($v->nodeName === 'loc') {
      $url[$k] = $v->nodeValue;
    }if ($v->nodeName === 'priority') {
      $priority[$k] = $v->nodeValue;
    }
  }
  print_r($url);
  print_r($priority);
  $queue->insert($url, $priority);
}
foreach ($DomNodeList as $url) {
  $urls[] = $url->nodeValue;
}

//display it
echo "<pre>";
print_r($urls);
echo "</pre>";
