#Hakemaasi Sivua ei löytynyt

Raision veneseuran sivuista ei löytynyt hakemaasi resurssia.

##Voit kokeilla esimerkiksi seuraavia:

Etusivu; 

<!-- start of freefind search box html -->
<form style="margin:0px; margin-top:4px;" action="http://search.freefind.com/find.html" method="get" accept-charset="utf-8" target="_self">
        <input type="hidden" name="si" value="56613594">
        <input type="hidden" name="pid" value="r">
        <input type="hidden" name="n" value="0">
        <input type="hidden" name="_charset_" value="">
        <input type="hidden" name="bcd" value="&#247;">
        <input type="text" name="query" size="15"> 
        <input type="submit" value="search">
</form>

<a style="text-decoration:none; color:gray;" href="http://www.freefind.com" >site search</a><a style="text-decoration:none; color:gray;" href="http://www.freefind.com" > by
<span style="color: #606060;">freefind</span></a>

<a href="http://search.freefind.com/find.html?si=56613594&amp;pid=a">advanced</a>
<div class="responsive-embed">
<iframe name="search"></iframe>
</div>
<!-- end of freefind search box html -->

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