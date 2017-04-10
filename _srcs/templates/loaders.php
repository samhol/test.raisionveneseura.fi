<?php

namespace Sphp\MVC;

use Sphp\Html\Foundation\Sites\Containers\ExceptionCallout;
use Sphp\Html\Container;
use Sphp\Html\Div;
$loadNotFound = function () {
  (new Container)->appendMdFile("_srcs/templates/notFound.php")->printHtml();
};
$loadPage = function ($par, $file = 'etusivu') use($loadNotFound) {
  //print_r(func_get_args());
  try {
    ob_start();
    $page = "sivut/$file.php";
    if (is_file($page)) {
      (new Div)->appendMdFile($page)->addCssClass('page')->printHtml();
    } else {
      $loadNotFound($par);
    }
    $content = ob_get_contents();
  } catch (\Exception $e) {
    $content .= new ExceptionCallout($e);
  }
  ob_end_clean();
  echo $content;
};
$seasonSchedule = function ($par) use ($loadPage) {
  $page = str_replace('/', '', $par);
  if ($page === date('Y')) {
    $loadPage('kausiohjelma');
  }
};

$loadIndex = function () use ($loadPage) {
  $loadPage('etusivu');
};
$loadFishingCompetition = function ($path, $year) use($loadNotFound) {
  $path = "sivut/kilpailut/kalastus/$year.php";
  if (is_file($path)) {
    (new Div)->appendMdFile(['_srcs/templates/tools.php', $path])
            ->appendMd(TAKAISIN_KILPAILUVALIKKOON)
            ->addCssClass('competitions page')
            ->printHtml();
  } else {
    $loadNotFound($year);
  }
};
$loadSailingCompetition = function ($path, $year) use($loadNotFound) {
  $path = "sivut/kilpailut/purjehdus/$year.php";
  if (is_file($path)) {
    (new Div)->appendMdFile(['_srcs/templates/tools.php', $path])
            ->appendMd(TAKAISIN_KILPAILUVALIKKOON)
            ->addCssClass('competitions page')
            ->printHtml();
  } else {
    $loadNotFound($year);
  }
};
$loadCompetition_del = function ($param) use ($loadPage) {
  echo $param;
  $loadPage('kilpailut');
};


