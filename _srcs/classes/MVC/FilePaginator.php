<?php

namespace Sphp\MVC;

use Sphp\Html\ContentInterface;
use Sphp\Html\Foundation\Sites\Navigation\Pagination\Pagination;
use SplFileInfo;
use Sphp\Html\Foundation\Sites\Navigation\Pagination\Page;

class FilePaginator implements ContentInterface {

  use \Sphp\Html\ContentTrait;

  /**
   *
   * @var SplFileInfo[]
   */
  private $files = [];
  private $pageParser;

  public function __construct($path = null, callable $pageParser = null) {
    $this->setFiles($path);
    if ($pageParser === null) {
      $pageParser = function(SplFileInfo $file, $index) {
        return new Page("$file", $index);
      };
    }
    $this->setPageParser($pageParser);
  }

  protected function parseYears($files) {
    $years = [];
    foreach ($files as $file) {
      $basename = $file->getBasename();
      //var_dump($file);
      $years[$basename] = $file;
    }
    return $years;
  }

  /**
   * 
   * @param SplFileInfo[] $folder
   * @return $this
   */
  public function setFiles($folder) {
    $this->files = $folder;
    return $this;
  }

  public function setPageParser(callable $pageParser) {
    $this->pageParser = $pageParser;
    return $this;
  }
  
  public function createPagination() {
    $paginator = new Pagination();
    $parser = $this->pageParser;
    foreach ($this->files as $k => $v) {
     // echo "$k\n";
      $paginator->setPage($k, $parser($v, $k));
    }
    // $paginator->setPages($array);
    //$paginator->getPreviousPageButton()->setContent('Edellinen vuosi');
    //$paginator->getNextPageButton()->setContent('Seuraava vuosi');
    // $paginator->getPage(2014)->disable();
    return $paginator;
  }

  public function getHtml() {
    try {
      return $this->createPagination()->getHtml();
    } catch (\Exception $ex) {
      return (new \Sphp\Html\Foundation\Sites\Containers\ExceptionCallout($ex))->showInitialFile()->showPreviousException()->showTrace()->getHtml();
    }
  }

}
