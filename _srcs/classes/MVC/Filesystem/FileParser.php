<?php

/**
 * FileParser.php (UTF-8)
 * Copyright (c) 2017 Sami Holck <sami.holck@gmail.com>
 */

namespace Sphp\MVC\Filesystem;

use SplFileObject;

/**
 * Description of FileParser
 *
 * @author  Sami Holck <sami.holck@gmail.com>
 * @since   2017-04-26
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPLv3
 * @filesource
 */
class FileParser {

  /**
   *
   * @var int 
   */
  private $sortingOrder;

  /**
   * Constructs a new instance
   * 
   * @param int $sortingOrder optional file sorting order
   * @see   http://php.net/manual/en/function.scandir.php#refsect1-function.scandir-parameters
   */
  public function __construct($sortingOrder = \SCANDIR_SORT_ASCENDING) {
    $this->setSortingOrder($sortingOrder);
  }

  /**
   * 
   * @param  string $dir the directory that will be scanned
   * @return SplFileObject[]
   */
  public function __invoke($dir) {
    return $this->parseFiles($dir);
  }

  /**
   * 
   * 
   * @param  int $sortingOrder
   * @return $this
   * @see   http://php.net/manual/en/function.scandir.php#refsect1-function.scandir-parameters
   */
  public function setSortingOrder($sortingOrder) {
    $this->sortingOrder = $sortingOrder;
    return $this;
  }

  /**
   * 
   * @param  string $dir the directory that will be scanned
   * @return SplFileObject[]
   */
  public function parseFiles($dir) {
    $files = [];
    foreach (scandir($dir, $this->sortingOrder) as $node) {
      $path = "$dir/$node";
      if (!is_dir($path)) {
        $file = new SplFileObject($path);
        $key = pathinfo($node, \PATHINFO_FILENAME);
        if (array_key_exists($key, $files)) {
          $key = $node;
        }
        $files[$key] = $file;
      }
    }
    return $files;
  }

}
