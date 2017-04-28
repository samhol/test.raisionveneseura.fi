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
  private $hyperlinkGenerator;

  /**
   * Constructs a new instance
   * 
   * @param FileParser|null $fp optional file system parser
   * @param HyperlinkGenerator|null $hl optional hyperlink object generator
   */
  public function __construct(FileParser $fp = null, HyperlinkGenerator $hl = null) {
    parent::__construct($fp);
    if ($hl === null) {
      $hl = new HyperlinkGenerator();
    }
    $this->hyperlinkGenerator = $hl;
  }

  /**
   * 
   * @return HyperlinkGenerator
   */
  public function getLinkGen() {
    return $this->hyperlinkGenerator;
  }

  /**
   * 
   * @param  HyperlinkGenerator $hl
   * @return self for a fluent interface
   */
  public function setLinkGen(HyperlinkGenerator $hl) {
    $this->hyperlinkGenerator = $hl;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function generate() {
    $ul = new Ul();
    foreach ($this->getFiles() as $item) {
      if ($item->isFile()) {
        $this->hyperlinkGenerator->setFile($item);
        $ul->append($this->hyperlinkGenerator->generate());
      }
    }
    return $ul;
  }

}
