<?php

namespace Sphp\MVC;

use Sphp\Html\Foundation\Sites\Containers\ExceptionCallout;
use Sphp\Html\Div;

$loadNotFound = function () {
  (new Div)->addCssClass('page show-logo')
          ->appendMdFile("_srcs/templates/notFound.php")
          ->printHtml();
};
$loadPage = function ($par, $file = 'etusivu') use($loadNotFound) {
  //print_r(func_get_args());
  try {
    ob_start();
    $page = "sivut/$file.php";
    if (is_file($page)) {
      (new Div)->appendMdFile($page)->addCssClass(['page', $file])->printHtml();
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
            ->addCssClass('competitions page show-logo')
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
$loadContents = function () {
  (new Div)->appendMdFile(['_srcs/templates/contents.php'])
          ->addCssClass('contests page show-logo')
          ->printHtml();
};

$loadBulletingBoard = function () {
  (new Div)->appendMdFile(['_srcs/templates/bulletingBoard.php'])
          ->addCssClass('bulletingboard page')
          ->printHtml();
};
$loadDocLists = function () {
  (new Div)->appendMdFile(['_srcs/templates/docList.php'])
          ->addCssClass('docs page show-logo')
          ->printHtml();
};
