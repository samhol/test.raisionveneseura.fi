<?php

/**
 * Rectangle.php (UTF-8)
 * Copyright (c) 2016 Sami Holck <sami.holck@gmail.com>
 */

namespace Sphp\Html\Media\ImageMap;

/**
 * Implements an HTML &lt;area shape="rect"&gt; tag
 *
 * @author  Sami Holck <sami.holck@gmail.com>
 * @since   2016-05-31
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPLv3
 * @filesource
 */
class Rectangle extends AbstractArea {

  /**
   * Constructs a new instance
   * 
   * @param int $x1 the top left x-coordinate
   * @param int $y1 the top left y-coordinate
   * @param int $x2 the bottom right x-coordinate
   * @param int $y2 the bottom right y-coordinate
   * @param string|null $href the URL of the link
   * @param string $alt
   */
  public function __construct(int $x1 = 0, int $y1 = 0, int $x2 = 0, int $y2 = 0, $href = null, $alt = null) {
    parent::__construct('area', $href, $alt);
    $this->setCoordinates($x1, $y1, $x2, $y2);
  }

  /**
   * Sets the top left coordinates of the rectangle
   * 
   * @param  int $x the top left x-coordinate
   * @param  int $y the top left y-coordinate
   * @return self for a fluent interface
   */
  public function setTopLeft(int $x, int $y) {
    $coords = split(',', $this->getCoordinates());
    $coords[0] = $x;
    $coords[1] = $y;
    $coordsString = implode(',', $coords);
    $this->attrs()->set('coords', $coordsString);
    return $this;
  }

  /**
   * Sets the bottom right coordinates of the rectangle
   * 
   * @param  int $x the bottom right x-coordinate
   * @param  int $y the bottom right y-coordinate
   * @return self for a fluent interface
   */
  public function setBottomRight(int $x, int $y) {
    $coords = split(',', $this->getCoordinates());
    $coords[2] = $x;
    $coords[3] = $y;
    $coordsString = implode(',', $coords);
    $this->attrs()->set('coords', $coordsString);
    return $this;
  }

  /**
   * Sets the coordinates of the rectangle
   * 
   * @param  int $x1 the top left x-coordinate
   * @param  int $y1 the top left y-coordinate
   * @param  int $x2 the bottom right x-coordinate
   * @param  int $y2 the bottom right y-coordinate
   * @return self for a fluent interface
   */
  public function setCoordinates(int $x1, int $y1, int $x2, int $y2) {
    $coords = [$x1, $y1, $x2, $y2];
    $coordsString = implode(',', $coords);
    $this->attrs()->set('coords', $coordsString);
    return $this;
  }

}
