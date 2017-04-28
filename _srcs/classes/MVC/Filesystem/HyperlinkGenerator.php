<?php

/**
 * FileLinkGenerator.php (UTF-8)
 * Copyright (c) 2017 Sami Holck <sami.holck@gmail.com>
 */

namespace Sphp\MVC\Filesystem;

use Sphp\MVC\AbstractComponentGenerator;
use SplFileInfo;
use Sphp\Html\Navigation\HyperlinkInterface;
use Sphp\Html\Navigation\Hyperlink;
use Sphp\Html\Foundation\Sites\Media\FiletypeBadge;


/**
 * Description of FileLinkGenerator
 *
 * @author  Sami Holck <sami.holck@gmail.com>
 * @since   2017-04-14
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPLv3
 * @filesource
 */
class HyperlinkGenerator extends AbstractComponentGenerator {

  /**
   *
   * @var SplFileInfo
   */
  private $file;

  /**
   *
   * @var string 
   */
  private $target = '_self';

  /**
   *
   * @var callable|string
   */
  private $displayName;

  /**
   *
   * @var string 
   */
  private $linkType = Hyperlink::class;

  public function __construct(SplFileInfo $file = null) {
    $this->file = $file;
  }

  /**
   * 
   * @return string
   */
  public function getLinkType() {
    return $this->linkType;
  }

  /**
   * 
   * @param  string $linkType
   * @return $this
   */
  public function setLinkType($linkType) {
    $this->linkType = $linkType;
    return $this;
  }

  /**
   * 
   * @return string
   */
  public function getDisplayName() {
    if (is_string($this->displayName)) {
      $name = $this->displayName;
    } else if (is_callable($this->displayName)) {
      $f = $this->displayName;
      $name = $f($this->getFile());
    } else {
      $name = $this->getFile()->getFilename();
    }
    return $name;
  }

  /**
   * 
   * @param  callable|string $filenameText
   * @return self for a fluent interface
   */
  public function setDisplayName($filenameText) {
    $this->displayName = $filenameText;
    return $this;
  }

  public function getTarget() {
    return $this->target;
  }

  /**
   * 
   * @param  string $target
   * @return self for a fluent interface
   */
  public function setTarget($target) {
    $this->target = $target;
    return $this;
  }

  /**
   * 
   * @return SplFileInfo
   */
  public function getFile() {
    return $this->file;
  }

  /**
   * 
   * @param  SplFileInfo $file
   * @return self for a fluent interface
   */
  public function setFile(SplFileInfo $file) {
    $this->file = $file;
    return $this;
  }

  /**
   * 
   * @param  int $precision
   * @return string
   */
  protected function formatBytes($precision = 2) {
    $base = log($this->file->getSize(), 1024);
    $suffixes = array('t', 'Kt', 'Mt', 'Gt', 'Tt');
    return round(pow(1024, $base - floor($base)), $precision) . ' ' . $suffixes[floor($base)];
  }

  /**
   * 
   * @return HyperlinkInterface
   * @throws \Sphp\Exceptions\RuntimeException
   */
  public function generate() {
    $badge = new FiletypeBadge($this->file);
    $dpName = $this->getDisplayName();
    $linkText = "$badge $dpName";
    $target = $this->getTarget();
    if ($this->file->isFile()) {
      $path = UrlGenerator::generate($this->file);
      $extension = $this->file->getFileInfo()->getExtension();
      if ($extension === 'php') {
        $name = $this->file->getBasename('.php');   
      } else if ($extension === 'pdf') {
        $name = $this->file->getBasename('.pdf');
        $size = $this->formatBytes();
        $linkText .= " <small>($size)</small>";
        $target = $name . $size;
      } else if ($extension === 'xls') {
        $name = $this->file->getBasename('.xls');
        $size = $this->formatBytes();
        $linkText .= " <small>($size)</small>";
        $target = $name . $size;
      } else {
        
      }
      $link = new $this->linkType;
      $link->setHref($path)->setTarget($target)->replaceContent($linkText);
    } else {
      throw new \Sphp\Exceptions\RuntimeException();
    }
    return $link;
  }

}
