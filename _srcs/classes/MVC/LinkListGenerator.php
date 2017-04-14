<?php

/**
 * LinkListGenerator.php (UTF-8)
 * Copyright (c) 2017 Sami Holck <sami.holck@gmail.com>
 */

namespace Sphp\MVC;

use Sphp\Html\ContentInterface;
use SplFileInfo;
use Sphp\Html\Lists\Ul;

/**
 * Description of LinkListGenerator
 *
 * @author  Sami Holck <sami.holck@gmail.com>
 * @since   2017-04-14
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPLv3
 * @filesource
 */
class LinkListGenerator implements ContentInterface {

  use \Sphp\Html\ContentTrait;

  /**
   *
   * @var SplFileInfo[] 
   */
  private $files;
  private $urlPath;

  /**
   *
   * @var FileLinkGenerator 
   */
  private $linkGen;

  public function __construct($files = null) {
    $this->files = $files;
    $this->linkGen = new FileLinkGenerator();
  }

  /**
   * 
   * @return FileLinkGenerator
   */
  public function getLinkGen() {
    return $this->linkGen;
  }

  public function setLinkGen(FileLinkGenerator $linkGen) {
    $this->linkGen = $linkGen;
    return $this;
  }

  public function getFiles() {
    return $this->files;
  }

  public function setFiles($files) {
    $this->files = $files;
    return $this;
  }

  public function getHtml() {
    $ul = new Ul();
    foreach ($this->files as $item) {
      if ($item->isFile()) {
        $this->linkGen->setFile($item);
        $ul->append($this->linkGen->buildLink());
      }
    }
    return $ul->getHtml();
  }

}
