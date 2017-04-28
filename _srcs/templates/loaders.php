<?php

namespace Sphp\MVC;

use Sphp\Html\Foundation\Sites\Containers\ExceptionCallout;
use Sphp\Html\Div;

$loadNotFound = function () {
  $div = new Div();
  $div->addCssClass(['page', 'show-logo'])
          ->appendMdFile("_srcs/templates/notFound.php")
          ->printHtml();
};
$loadPage = function ($par, $file = 'etusivu') use($loadNotFound) {
  //print_r(func_get_args());
  try {
    ob_start();
    $filename = pathinfo($file, PATHINFO_FILENAME);
    $page = "sivut/$filename.php";
    if (is_file($page)) {
      (new Div)->appendMdFile($page)->addCssClass(['page', $file])->printHtml();
    } else {
      $loadNotFound($par);
    }
    $content = ob_get_contents();
  } catch (\Exception $e) {
    $content .= (new ExceptionCallout($e))->showTrace()->showPreviousException(true)->showInitialFile();
  }
  ob_end_clean();
  echo $content;
};
$seasonSchedule = function () use ($loadPage) {
  $loadPage('kausiohjelma');
};

$loadIndex = function () use ($loadPage) {
  $loadPage('etusivu');
};
$loadFishingCompetition = function ($path, $year) use($loadNotFound) {
  $filename = pathinfo($path, PATHINFO_FILENAME);
  $path = "sivut/kilpailut/kalastus/$filename.php";
  if (is_file($path)) {
    putenv("year=$filename");
    (new Div)->appendMdFile(['_srcs/templates/tools.php', $path])
            ->appendMd(TAKAISIN_KILPAILUVALIKKOON)
            ->addCssClass(['fishing', 'competitions', 'page', 'show-logo'])
            ->printHtml();
  } else {
    $loadNotFound($year);
  }
};
$loadSailingCompetition = function ($path, $year) use($loadNotFound) {
  $filename = pathinfo($path, PATHINFO_FILENAME);
  $path = "sivut/kilpailut/purjehdus/$filename.php";
  if (is_file($path)) {
    putenv("year=$filename");
    (new Div)->appendMdFile(['_srcs/templates/tools.php', $path])
            ->appendMd(TAKAISIN_KILPAILUVALIKKOON)
            ->addCssClass(['competitions', 'page'])
            ->printHtml();
  } else {
    $loadNotFound($year);
  }
};
$loadContents = function () {
  (new Div)->appendMdFile(['_srcs/templates/contents.php'])
          ->addCssClass(['contests', 'page', 'show-logo'])
          ->printHtml();
};

$loadBulletingBoard = function () {
  (new Div)->appendMdFile(['_srcs/templates/bulletingBoard.php'])
          ->addCssClass(['bulletingboard', 'page'])
          ->printHtml();
};
$loadDocLists = function () {
  (new Div)->appendMdFile(['_srcs/templates/docList.php'])
          ->addCssClass(['docs', 'page', 'show-logo'])
          ->printHtml();
};
$loadMembershipForm = function () {
  (new Div)->appendMdFile(['_srcs/templates/membershipForm.php'])
          ->addCssClass(['docs', 'page', 'form'])
          ->printHtml();
};
$loadBoardMembers = function () {
  (new Div)->appendMdFile(['_srcs/templates/clubBoard.php'])
          ->addCssClass(['page', 'board'])
          ->printHtml();
};
