<?php

/**
 * LinkListGenerator.php (UTF-8)
 * Copyright (c) 2017 Sami Holck <sami.holck@gmail.com>
 */

namespace Sphp\MVC\Filesystem;

use Sphp\Html\Lists\Ul;

/**
 * Description of LinkListGenerator
 *
 * @author  Sami Holck <sami.holck@gmail.com>
 * @since   2017-04-14
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPLv3
 * @filesource
 */
class LinkListGenerator extends AbstractFileLinkGenerator {

  /**
   *
   * @var HyperlinkGenerator 
   */
  private $linkGen;

  /**
   * Constructs a new instance
   * 
   * @param FileParser|null $fp optional file system parser
   * @param HyperlinkGenerator|null $fl optional hyperlink object generator
   */
  public function __construct(FileParser $fp = null, HyperlinkGenerator $fl = null) {
    parent::__construct($fp);
    if ($fl === null) {
      $fl = new HyperlinkGenerator();
    }
    $this->linkGen = $fl;
  }

  /**
   * 
   * @return HyperlinkGenerator
   */
  public function getLinkGen() {
    return $this->linkGen;
  }

  /**
   * 
   * @param  HyperlinkGenerator $linkGen
   * @return self for a fluent interface
   */
  public function setLinkGen(HyperlinkGenerator $linkGen) {
    $this->linkGen = $linkGen;
    return $this;
  }

  /**
   * 
   * @return Ul
   */
  public function generate() {
    $ul = new Ul();
    foreach ($this->getFiles() as $item) {
      if ($item->isFile()) {
        $this->linkGen->setFile($item);
        $ul->append($this->linkGen->buildLink());
      }
    }
    return $ul;
  }

}
