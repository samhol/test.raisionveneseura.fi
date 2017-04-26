<?php

/**
 * AbstractComponentGenerator.php (UTF-8)
 * Copyright (c) 2017 Sami Holck <sami.holck@gmail.com>
 */

namespace Sphp\MVC;

use Sphp\Html\ContentInterface;

/**
 * Description of AbstractFileLinkGenerator
 *
 * @author  Sami Holck <sami.holck@gmail.com>
 * @since   2017-04-26
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPLv3
 * @filesource
 */
abstract class AbstractComponentGenerator implements ContentInterface {

  use \Sphp\Html\ContentTrait;

  /**
   * {@inheritdoc}
   */
  public function getHtml() {
    return $this->generate()->getHtml();
  }

  /**
   * Generates an HTML component containing the links
   * 
   * @return ContentInterface HTML component containing the links
   */
  abstract public function generate();
}
