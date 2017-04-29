<?php

use Sphp\Html\Tables\TableBuilder;
use Sphp\Stdlib\CsvFile;

$csvTaulu = function($polku) {
  $builder = TableBuilder::fromCsvFile(new CsvFile($polku));
  $builder->setLineNumbersPosition(TableBuilder::LINENUMBERS_LEFT)
          ->buildTable()->addCssClass('hover')
          ->printHtml();
};

use Sphp\MVC\Filesystem\FilePaginator;
use Sphp\Html\Foundation\Sites\Navigation\Pagination\Page;

$parseFiles = new \Sphp\MVC\Filesystem\FileParser();

$kalastusKilpailut = function() {
  $year = getenv('year');
  if (!$year) {
    $year = date('Y');
  }
  $paginator = new FilePaginator();
  $paginator->setPageParser(function(\SplFileInfo $file, $index) {
    $path = "kilpailut/kalastus/$index.php";
    return new Page($path, $file->getBasename('.' . $file->getExtension()));
  });
  $paginator->loadFiles('sivut/kilpailut/kalastus');
  $pagination = $paginator->generate();
  try {
    $pagination->setCurrentPage($year);
  } catch (\Exception $ex) {
    echo $ex;
  }
  $pagination->getPreviousPageButton()->setContent('Edellinen');
  $pagination->getNextPageButton()->setContent('Seuraava');
  echo "<hr>\n";
  $pagination->printHtml();
  echo "\n<hr>\n";
};

$purjehdusKilpailutLinkit = function() {
  $year = getenv('year');
  if (!$year) {
    $year = date('Y');
  }
  $paginator = new FilePaginator();
  $paginator->setPageParser(function(\SplFileInfo $file, $index) {
    $path = Sphp\MVC\Filesystem\UrlGenerator::generate($file);
    $ext = $file->getExtension();
    return (new Page($path, $index))->addCssClass($ext);
  });
  $paginator->loadFiles('sivut/kilpailut/purjehdus');
  $pagination = $paginator->generate();
  $pagination->setCurrentPage($year);
  $pagination->visibleBeforeCurrent(3);
  $pagination->visibleAfterCurrent(3);
  $pagination->getPreviousPageButton()->setContent('Edellinen');
  $pagination->getNextPageButton()->setContent('Seuraava');
  echo "\n<hr>\n$pagination\n<hr>\n";
};

$sivutus = function($hakemisto, $sivu) {
  $pagination = new FilePaginator();
  $pagination->setPageParser(function(\SplFileInfo $file) {
    return new Page("$file", $file->getBasename('.' . $file->getExtension()));
  });
  $pagination->setFiles($hakemisto);
  $pagination->createPagination()
          ->setCurrentPage($sivu);
  return $pagination;
};
