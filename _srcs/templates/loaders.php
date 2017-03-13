<?php

namespace Sphp\MVC;

use Sphp\Html\Foundation\Sites\Containers\ExceptionCallout;
use Sphp\Html\Container;

$loadPage = function ($par) {
  try {
    ob_start();
    $page = 'sivut/' . str_replace(['/'], [''], $par) . '.php';
    if ($par === '/') {
      (new Container)->appendMdFile("sivut/index.php")->printHtml();
    } else if (is_file($page)) {
      (new Container)->appendMdFile($page)->printHtml();
    } else {
      throw new \InvalidArgumentException("the path $page points to no executable PHP script");
    }



    $content = ob_get_contents();
  } catch (\Exception $e) {
    $content .= new ExceptionCallout($e);
  }
  ob_end_clean();
  echo $content;
};
$seasonSchedule = function ($par) use ($loadPage) {
  echo $par;
  $page = str_replace(['/'], [''], $par);
  if ($page === date('Y')) {
    $loadPage('kausiohjelma');
  }
};

$loadIndex = function () use ($loadPage) {
  $loadPage('etusivu');
};
$loadFishingCompetition = function ($path) use ($loadPage) {
  $parts = explode('/', trim($path, '/'));
  //$loadPage('kilpailut/kalastus/' . array_pop($parts).".php");
  (new Container)->appendMdFile("sivut/kilpailut/kalastus/" . array_pop($parts) . ".php")->printHtml();
};
$loadSailingCompetition = function ($path) use ($loadPage) {
  $parts = explode('/', trim($path, '/'));
  //$loadPage('kilpailut/kalastus/' . array_pop($parts).".php");
  (new Container)->appendMdFile("sivut/kilpailut/purjehdus/" . array_pop($parts) . ".php")->printHtml();
};
$loadCompetition = function ($param) use ($loadPage) {
  echo $param;
  $loadPage('kilpailut');
};

$loadNotFound = function ($param) use ($loadPage) {
  (new Container)->appendMdFile("_srcs/templates/notFound.php")->printHtml();
};

