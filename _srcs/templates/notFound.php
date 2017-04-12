#Hakemaasi Sivua ei löytynyt

Raision veneseuran sivuista ei löytynyt hakemaasi resurssia.

##Voit kokeilla esimerkiksi seuraavia:

Etusivu; 
<pre>
  <?php
  include '_srcs/menuArrays.php';
  $urls = array();

  $DomDocument = new DOMDocument();
  $DomDocument->preserveWhiteSpace = false;
  $DomDocument->load('sitemap.xml');
  $DomNodeList = $DomDocument->getElementsByTagName('loc');
  $urlNodes = $DomDocument->getElementsByTagName('url');
  $queue = new Sphp\Stdlib\Datastructures\StablePriorityQueue();
  foreach ($urlNodes as $urlNode) {
    if ($urlNode instanceof DOMElement) {
      $url = $urlNode->getElementsByTagName('loc')->item(0)->nodeValue;
      $priority = $urlNode->getElementsByTagName('priority')->item(0)->nodeValue;
      $queue->insert($url, $priority);
      //print_r($url);
      //print_r($priority);
    }
  }
  $titleGenerator = new \Sphp\MVC\TitleGenerator($mainLinks);
  $ul = new \Sphp\Html\Lists\Ul();

  use Sphp\MVC\Router;

$index = array('0' => '1', '1' => '4', '2' => '7');
  $update[3] = ['a'];

  //print_r($update);
  $f = Sphp\Stdlib\Arrays::createKeyChain($index, $update, 'new data in');
  echo "f:\n";
  print_r($f);
  $l = [];
  $k = [];
  foreach ($queue as $url) {
    $path = parse_url($url, PHP_URL_PATH);
    $path = trim($path, "/");
    $parts = explode('/', $path);
    $num = function ($part) {
      if (is_numeric($part)) {
        echo "wrgae $part";
        $part = (int) $part;
      }
      return $part;
    };
    $parts = array_map($num, $parts);
    //var_dump($parts);

    $f = Sphp\Stdlib\Arrays::createKeyChain($parts, $url);
    $k = array_merge_recursive($k, $f);
    //$k = $f + $k;
    print_r($k);


    //$index = array('0' => '1', '1' => '4', '2' => '7');
    // $where = &$l;

   
    //$where = $url;
    $ul->appendLink($url, $titleGenerator->createTitleFor($path), '_self');
  }
  $ul->printHtml();
  foreach ($DomNodeList as $url) {
    $urls[] = $url->nodeValue;
  }

//display it
  echo "<pre>";
  print_r($urls);
  echo "</pre>";
  ?>

</pre>