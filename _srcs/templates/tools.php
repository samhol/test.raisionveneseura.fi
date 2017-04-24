<?php

use Sphp\Html\Tables\TableBuilder;
use Sphp\Stdlib\CsvFile;

$csvTaulu = function($polku) {
  echo TableBuilder::fromCsvFile(new CsvFile($polku));
};

use Sphp\MVC\FilePaginator;
use Sphp\Html\Foundation\Sites\Navigation\Pagination\Page;

$parseFiles = function($folder) {
  $raw = iterator_to_array(new \FilesystemIterator($folder));

  $files = [];
  foreach ($raw as $file) {
    $index = $file->getBasename('.' . $file->getExtension());
    //var_dump($file);
    $files[$index] = $file;
  }
  ksort($files);
  return $files;
};
$kalastusKilpailut = function($vuosi) use ($parseFiles) {
  $paginator = new FilePaginator();
  $paginator->setPageParser(function(\SplFileInfo $file, $index) {
    $path = "kilpailut/kalastus/$index";
    return new Page($path, $file->getBasename('.' . $file->getExtension()));
  });
  $paginator->setFiles($parseFiles('sivut/kilpailut/kalastus'));
  $pagination = $paginator->createPagination();
  try {
    $pagination->setCurrentPage($vuosi);
  } catch (\Exception $ex) {
    echo $ex;
  }
  $pagination->getPreviousPageButton()->setContent('Edellinen vuosi');
  $pagination->getNextPageButton()->setContent('Seuraava vuosi');
  echo "\n";
  $pagination->printHtml();
  echo "\n";
};

$purjehdusKilpailut = function($vuosi) use ($parseFiles) {
  $paginator = new FilePaginator();
  $paginator->setPageParser(function(\SplFileInfo $file, $index) {
    $path = "kilpailut/purjehdus/$index";
    return new Page($path, $file->getBasename('.' . $file->getExtension()));
  });
  $paginator->setFiles($parseFiles('sivut/kilpailut/purjehdus'));
  $pagination = $paginator->createPagination();
  try {
    $pagination->setCurrentPage($vuosi);
  } catch (\Exception $ex) {
    echo $ex;
  }
  $pagination->getPreviousPageButton()->setContent('Edellinen vuosi');
  $pagination->getNextPageButton()->setContent('Seuraava vuosi');
  echo "\n";
  $pagination->printHtml();
  echo "\n";
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
