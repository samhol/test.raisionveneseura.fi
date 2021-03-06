<?php

/**
 * AbstractVideoPlayer.php (UTF-8)
 * Copyright (c) 2014 Sami Holck <sami.holck@gmail.com>
 */

namespace Sphp\Html\Media\Multimedia;

use Sphp\Html\AbstractComponent;
use Sphp\Html\Media\SizeableTrait;
use Sphp\Html\Media\LazyMediaSourceTrait;
use Sphp\Stdlib\URL;

/**
 * Implements an abstract iframe based Video component
 *
 * @author  Sami Holck <sami.holck@gmail.com>
 * @since   2014-12-01
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPLv3
 * @filesource
 */
abstract class AbstractVideoPlayer extends AbstractComponent implements VideoPlayerInterface {

  use SizeableTrait,
      LazyMediaSourceTrait;

  /**
   * the url of the player
   *
   * @var URL 
   */
  private $url;

  /**
   * the url of the player
   *
   * @var string 
   */
  private $videoId;

  /**
   * Constructs a new instance
   *
   * @param  string|URL $url the id of the Vimeo video
   * @param  string $videoId the id of the embedded video
   * @link   http://www.w3schools.com/tags/att_global_id.asp id attribute
   */
  public function __construct( $url, string $videoId = null) {
    parent::__construct('iframe');
    $this->setUrl($url)->allowFullScreen(true);
    if ($videoId !== null) {
      $this->setVideoId($videoId);
    }
  }

  public function __destruct() {
    parent::__destruct();
    unset($this->url, $this->videoId);
  }

  public function __clone() {
    parent::__clone();
    $this->url = clone $this->url;
    $this->setPlayerUrl($this->url);
  }

  /**
   * 
   * @return URL
   */
  protected function getUrl() {
    return $this->url;
  }

  /**
   * Sets the URL of the video service/player
   * 
   * @param  string|URL $url the URL of the video service/player
   * @return self for a fluent interface
   */
  protected function setUrl($url) {
    $this->url = ($url instanceof URL) ? $url : new URL($url);
    $this->setAttr('src', $this->url->getHtml());
    return $this;
  }

  /**
   * Sets the id of the viewed video stream
   * 
   * @param  string $videoId the id of the embedded video
   * @return self for a fluent interface
   */
  public function setVideoId($videoId) {
    $this->videoId = $videoId;
    $this->url->setPath($this->url->getPath() . $videoId);
    $this->setAttr('src', $this->url->getHtml());
    return $this;
  }

  public function allowFullScreen(bool $allow = true) {
    $this->attrs()
            //->set('webkitallowfullscreen', $allow)
            //->set('mozallowfullscreen', $allow)
            ->set('allowfullscreen', $allow);
    return $this;
  }

  public function autoplay(bool $autoplay = true) {
    $this->url->setParam('autoplay', (int) $autoplay);
    return $this;
  }

  public function loop(bool $loop = true) {
    $this->url->setParam('loop', (int) $loop);
    return $this;
  }

  /**
   * Unsetz the given parameter
   * 
   * These parameters are passed to the player as `url` query parameters
   * 
   * @param  string $name the name of the parameter to unset
   * @return self for a fluent interface
   */
  public function unsetParam($name) {
    $this->url->getPath();
    $this->url->unsetParam($name);
    return $this;
  }

  /**
   * Setz the parameter name value pair
   * 
   * These parameters are passed to the player as `url` query parameters
   * 
   * @param  string $name the name of the parameter
   * @param  scalar $value the value of the parameter
   * @return self for a fluent interface
   */
  public function setParam(string $name, $value) {
    $this->url->setParam($name, $value);
    return $this;
  }

  public function contentToString(): string {
    return '';
  }

}
