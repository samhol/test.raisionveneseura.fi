<?php

/**
 * SideNavViewer.php (UTF-8)
 * Copyright (c) 2014 Sami Holck <sami.holck@gmail.com>
 */

namespace Sphp\MVC;

use Sphp\Html\ContentInterface;
use Sphp\Html\Foundation\Sites\Navigation\AccordionMenu;
use Sphp\Html\Foundation\Sites\Navigation\MenuBuilder;

/**
 * 
 * @author  Sami Holck <sami.holck@gmail.com>
 * @since   2014-09-11
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPLv3
 * @filesource
 */
class SideNavViewer implements ContentInterface {

  use \Sphp\Html\ContentTrait;

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
   *
   * @var AccordionMenu 
   */
  private $nav;

  /**
   * 
   * @param array $data
   * @param string $currentPage
   */
  public function __construct($data, $currentPage = '') {
    $this->data = $data;
    $this->currentPage = $currentPage;
    $this->buildMenu();
  }

  /**
   * 
   * @return AccordionMenu
   */
  public function getMenu() {
    return $this->nav;
  }

  /**
   * 
   * @return self
   */
  protected function buildMenu() {
    $this->nav = new AccordionMenu();
    //$this->nav->addCssClass('sidenav');
    $builder = new MenuBuilder(new MenuLinkBuilder($this->currentPage));
    $builder->buildMenu($this->data, $this->nav);
    return $this;
  }

  public function getHtml() {
    return $this->nav->getHtml();
  }

}
