<?php

/**
 * FilePaginator.php (UTF-8)
 * Copyright (c) 2017 Sami Holck <sami.holck@gmail.com>
 */

namespace Sphp\MVC\Filesystem;

use Sphp\Html\Foundation\Sites\Navigation\Pagination\Pagination;
use Sphp\Html\Foundation\Sites\Navigation\Pagination\Page;
use SplFileInfo;

/**
 * Implements a Pagination generator for files
 *
 * @author  Sami Holck <sami.holck@gmail.com>
 * @since   2017-04-14
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPLv3
 * @filesource
 */
class FilePaginator extends AbstractFileLinkGenerator {

  /**
   *
   * @var callable 
   */
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
    if ($pageParser === null) {
      $pageParser = function(SplFileInfo $file, $index) {
        $ext = $file->getExtension();
        return (new Page("$file", $index))->addCssClass($ext);
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
