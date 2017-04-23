<?php

/**
 * Pagination.php (UTF-8)
 * Copyright (c) 2015 Sami Holck <sami.holck@gmail.com>
 */

namespace Sphp\Html\Foundation\Sites\Navigation\Pagination;

use Sphp\Html\AbstractComponent;
use IteratorAggregate;
use Countable;
use ArrayIterator;
use Sphp\Html\Container;
use Sphp\Html\Lists\Li as Li;
use Sphp\Stdlib\Arrays;

/**
 * Implements a Pagination component
 *
 * @author  Sami Holck <sami.holck@gmail.com>
 * @since   2015-05-20
 * @link    http://foundation.zurb.com/ Foundation
 * @link    http://foundation.zurb.com/docs/components/pagination.html Foundation Pagination
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPLv3
 * @filesource
 */
class Pagination extends AbstractComponent implements IteratorAggregate, Countable {

  /**
   *
   * @var PageInterface
   */
  private $previousPageButton;

  /**
   *
   * @var PageInterface
   */
  private $nextPageButton;

  /**
   *
   * @var Page[] 
   */
  private $pages = [];

  /**
   * @precondition $before >= 0 && $after >= 0
   * @var int
   */
  private $before = PHP_INT_MAX, $after = PHP_INT_MAX;

  /**
   *
   * @var int 
   */
  private $current;

  /**
   *
   * @var string 
   */
  private $target = '_self';

  /**
   *
   * @var string 
   */
  private $linkLabelPattern = 'Page %d';

  /**
   * Constructs a new instance
   * 
   * @param \Traversable|mixed[] $urls the value of the target attribute
   * @param int $range
   * @param string $target
   */
  public function __construct($target = '_self') {
    parent::__construct('ul');
    $this->cssClasses()
            ->lock('pagination');
    $this->attrs()
            ->lock('role', 'menubar')
            ->setAria('label', 'Pagination');
    $this->target = $target;
    $this->setPreviousPageButton();
    $this->setNextPageButton();
  }

  /**
   * Sets the default pattern for the Aria label of each pagination link
   *
   * @param  string $format the format string containing 
   * @return self for a fluent interface
   */
  public function setLinkAriaLabelPattern($format) {
    $this->linkLabelPattern = $format;
    foreach ($this->pages as $index => $page) {
      $this->setAriaLabelForPage($page, $index);
    }
    return $this;
  }

  private function setAriaLabelForPage($page, $index) {
    $page->setAriaLabel(sprintf($this->linkLabelPattern, $index));
    return $this;
  }

  /**
   * Sets the pattern for the default target of each pagination links
   *
   * **Notes:**
   *
   * * The `target` attribute specifies where to open the linked document.
   * * Only used if the `href` attribute is present.
   *
   * @param  string $target the value of the target attribute
   * @return self for a fluent interface
   * @link   http://www.w3schools.com/tags/att_a_target.asp target attribute
   */
  public function setTarget($target) {
    $this->target = $target;
    foreach ($this->pages as $page) {
      $page->setTarget($target);
    }
    return $this;
  }

  /**
   * 
   * @param  int $index
   * @return self for a fluent interface
   */
  public function setCurrent($index) {
    if (array_key_exists($index, $this->pages)) {
      $this->current = $index;
      foreach ($this->pages as $id => $page) {
        if ($id !== $index) {
          $page->setCurrent(false);
        } else {
          $page->setCurrent(true);
        }
      }
    }
    return $this;
  }

  /**
   * Sets a page into the paginator
   * 
   * @param  int|string $index the index of the page
   * @param  Page|string $page the page object or an URL string
   * @return self for a fluent interface
   */
  public function setPage($index, $page) {
    if (!$page instanceof PageInterface) {
      $page = new Page($page, $index, $this->target);
    }
    $this->pages[$index] = $page;
    if ($this->current === null) {
      $this->current = $index;
    }
    return $this;
  }

  /**
   * 
   * @param array $pages containing page objects or URL strings
   * @return $this
   */
  public function setPages(array $pages) {
    foreach ($pages as $index => $page) {
      $this->setPage($index, $page);
    }
    return $this;
  }

  public function setPreviousPageButton(PageInterface $prev = null) {
    if ($prev === null) {
      $this->previousPageButton = new Page(null, $prev, $this->target);
    }
    $this->previousPageButton->cssClasses()->lock('pagination-previous');
    return $this;
  }

  public function setNextPageButton(PageInterface $prev = null) {
    if ($prev === null) {
      $this->nextPageButton = new Page(null, $prev, $this->target);
    }
    $this->nextPageButton->cssClasses()->lock('pagination-next');
    return $this;
  }

  /**
   * 
   * @return PageInterface
   */
  public function getPreviousPageButton() {
    Arrays::pointToKey($this->pages, $this->current);
    if (prev($this->pages)) {
      $current = current($this->pages);
      $this->previousPageButton
              ->disable(false)
              ->setHref($current->getHref())
              ->setTarget($current->getTarget());
    } else {
      $this->previousPageButton->disable(true);
    }
    return $this->previousPageButton;
  }

  /**
   * 
   * @return PageInterface
   */
  public function getNextPageButton() {
    Arrays::pointToKey($this->pages, $this->current);
    if (next($this->pages)) {
      $next = current($this->pages);
      $this->nextPageButton
              ->disable(false)
              ->setHref($next->getHref())
              ->setTarget($next->getTarget());
    } else {
      $this->nextPageButton->disable(true);
    }
    return $this->nextPageButton;
  }

  /**
   * 
   * @return Li 
   */
  public function getEllipsis() {
    $ellipsis = new Li();
    $ellipsis->cssClasses()->lock('ellipsis');
    $ellipsis->attrs()->lock('aria-hidden', 'true');
    return $ellipsis;
  }

  /**
   * Sets the number of visible pagination items before active page
   * 
   * @param  int $num number of visible pagination items before active page
   * @return self for a fluent interface
   */
  public function visibleBeforeCurrent($num) {
    $this->before = $num;
    return $this;
  }

  /**
   * Sets the number of visible pagination items after active page
   * 
   * @param  int $num number of visible pagination items after active page
   * @return self for a fluent interface
   */
  public function visibleAfterCurrent($num) {
    $this->after = $num;
    return $this;
  }

  /**
   * Returns the page component at the specified index
   *
   * @param  int $index the index with the value
   * @return Page|null the value at the specified index or null
   */
  public function getPage($index) {
    $page = null;
    if (array_key_exists($index, $this->pages)) {
      $page = $this->pages[$index];
    }
    return $page;
  }

  /**
   * 
   * @return Page|null
   */
  public function current() {
    return $this->get($this->current);
  }

  /**
   * Returns a new iterator to iterate through inserted {@link Page} components 
   *
   * @return ArrayIterator iterator
   */
  public function getIterator() {
    return new ArrayIterator($this->pages);
  }

  /**
   * Count the number of inserted {@link Page} components
   *
   * @return int number of {@link Page} components
   * @link   http://php.net/manual/en/class.countable.php Countable
   */
  public function count() {
    return count($this->pages);
  }

  public function contentToString() {
    $cont = new Container();
    Arrays::pointToKey($this->pages, $this->current);
    $cont->append(current($this->pages));
    $before = $this->before;
    while ($before-- >= 0 && prev($this->pages)) {
      $cont->prepend(current($this->pages));
    }
    Arrays::pointToKey($this->pages, $this->current);
    $after = $this->after;
    while ($after-- >= 0 && next($this->pages)) {
      $cont->append(current($this->pages));
    }
    $cont->prepend($this->getPreviousPageButton());
    $cont->append($this->getNextPageButton());
    /* $first = $this->current - $this->range / 2;
      $last = $this->current + $this->range / 2 - 1;
      if ($first < 1) {
      $first = 1;
      } if ($last > $this->count()) {
      $first = $this->count() - $this->range + 1;
      } */
    return $cont->getHtml();
  }

}
