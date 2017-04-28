<?php

/**
 * AbstractFileLinkGenerator.php (UTF-8)
 * Copyright (c) 2017 Sami Holck <sami.holck@gmail.com>
 */

namespace Sphp\MVC\Filesystem;

use Sphp\MVC\AbstractComponentGenerator;
use Sphp\Html\ContentInterface;
use SplFileInfo;

/**
 * Description of AbstractFileLinkGenerator
 *
 * @author  Sami Holck <sami.holck@gmail.com>
 * @since   2017-04-26
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPLv3
 * @filesource
 */
abstract class AbstractFileLinkGenerator extends AbstractComponentGenerator {

  /**
   *
   * @var FileParser 
   */
  private $fileParser;

  /**
   *
   * @var SplFileInfo[]
   */
  private $files = [];

  /**
   * Constructs a new instance
   * 
   * @param FileParser $fileParser
   * @param callable $pageParser
   */
  public function __construct(FileParser $fileParser = null) {
    if ($fileParser === null) {
      $fileParser = new FileParser();
    }
    $this->fileParser = $fileParser;
  }

  /**
   * 
   * @param  string $path
   * @return ContentInterface
   */
  public function __invoke($path = null) {
    if ($path !== null) {
      $this->loadFiles($path);
    }
    return $this->generate();
  }

  /**
   * 
   * @return FileParser
   */
  public function getFileParser() {
    return $this->fileParser;
  }

  /**
   * 
   * @param  FileParser $fileParser
   * @return self for a fluent interface
   */
  public function setFileParser(FileParser $fileParser) {
    $this->fileParser = $fileParser;
    return $this;
  }

  /**
   * 
   * @param  string $path
   * @return self for a fluent interface
   */
  public function loadFiles($path) {
    $fileParser = $this->fileParser;
    $this->setFiles($fileParser->parseFiles($path));
    return $this;
  }

  /**
   * 
   * @param SplFileInfo[] $folder
   * @return self for a fluent interface
   */
  public function setFiles($folder) {
    $this->files = $folder;
    return $this;
  }

  /**
   * 
   * @return SplFileInfo[]
   */
  public function getFiles() {
    return $this->files;
  }

}
