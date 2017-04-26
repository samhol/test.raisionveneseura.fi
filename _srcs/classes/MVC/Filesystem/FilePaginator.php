<?php

namespace Sphp\MVC\Filesystem;

use Sphp\Html\ContentInterface;
use Sphp\Html\Foundation\Sites\Navigation\Pagination\Pagination;
use SplFileInfo;
use Sphp\Html\Foundation\Sites\Navigation\Pagination\Page;
use Sphp\Html\Foundation\Sites\Containers\ExceptionCallout;

class FilePaginator extends AbstractFileLinkGenerator {

  private $pageParser;

  /**
   * Constructs a new instance
   * 
   * @param FileParser $fileParser
   * @param callable $pageParser
   */
  public function __construct(FileParser $fileParser = null, callable $pageParser = null) {

    parent::__construct($fileParser);
    if ($fileParser === null) {
      $fileParser = new FileParser();
    }
    //$this->fileParser = $fileParser;
    //$this->setFiles($path);
    if ($pageParser === null) {
      $pageParser = function(SplFileInfo $file, $index) {
        return new Page("$file", $index);
      };
    }
    $this->setPageParser($pageParser);
  }

  /**
   * 
   * @param  callable $pageParser
   * @return self for a fluent interface
   */
  public function setPageParser(callable $pageParser) {
    $this->pageParser = $pageParser;
    return $this;
  }

  /**
   * 
   * @return Pagination
   */
  public function generate() {
    $paginator = new Pagination();
    $parser = $this->pageParser;
    foreach ($this->getFiles() as $k => $v) {
      $paginator->setPage($k, $parser($v, $k));
    }
    return $paginator;
  }

}
