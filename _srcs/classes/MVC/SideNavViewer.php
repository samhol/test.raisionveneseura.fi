<?php

/**
 * SideNavViewer.php (UTF-8)
 * Copyright (c) 2014 Sami Holck <sami.holck@gmail.com>
 */

namespace Sphp\MVC;

use Sphp\Html\Foundation\Sites\Navigation\AccordionMenu;
use Sphp\Html\Foundation\Sites\Navigation\MenuBuilder;

/**
 * 
 * @author  Sami Holck <sami.holck@gmail.com>
 * @since   2014-09-11
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPLv3
 * @filesource
 */
class SideNavViewer extends AbstractComponentGenerator {

  /**
   *
   * @var array 
   */
  private $data;

  /**
   *
   * @var string
   */
  private $currentPage;

  /**
   * Constructs a new instance
   * 
   * @param array $data
   * @param string $currentPage
   */
  public function __construct($data, $currentPage = '') {
    $this->data = $data;
    $this->currentPage = $currentPage;
  }

  /**
   * {@inheritdoc}
   */
  public function generate() {
    $builder = new MenuBuilder(new MenuLinkBuilder($this->currentPage));
    return $builder->buildMenu($this->data, new AccordionMenu());
  }

}
