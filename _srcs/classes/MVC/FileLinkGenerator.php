<?php

/**
 * FileLinkGenerator.php (UTF-8)
 * Copyright (c) 2017 Sami Holck <sami.holck@gmail.com>
 */

namespace Sphp\MVC;

use Sphp\Html\ContentInterface;
use SplFileInfo;
use Sphp\Stdlib\Path;
use Sphp\Html\Navigation\HyperlinkInterface;
use Sphp\Html\Navigation\Hyperlink;

/**
 * Description of FileLinkGenerator
 *
 * @author  Sami Holck <sami.holck@gmail.com>
 * @since   2017-04-14
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPLv3
 * @filesource
 */
class FileLinkGenerator implements ContentInterface {

  use \Sphp\Html\ContentTrait;

  /**
   *
   * @var SplFileInfo
   */
  private $file;
  private $urlPath;
  private $target = '_self';
  private $filenameText;
  private $linkType = Hyperlink::class;

  public function __construct(SplFileInfo $file = null) {
    $this->file = $file;
  }

  public function getLinkType() {
    return $this->linkType;
  }

  public function setLinkType($linkType) {
    $this->linkType = $linkType;
    return $this;
  }

  public function getFilenameText() {
    return $this->filenameText;
  }

  public function setFilenameText($filenameText) {
    $this->filenameText = $filenameText;
    return $this;
  }

  public function getTarget() {
    return $this->target;
  }

  public function setTarget($target) {
    $this->target = $target;
    return $this;
  }

  public function getFile() {
    return $this->file;
  }

  public function getUrlPath() {
    return $this->urlPath;
  }

  public function setFile(SplFileInfo $file) {
    $this->file = $file;
    return $this;
  }

  public function setUrlPath($urlPath) {
    $this->urlPath = $urlPath;
    return $this;
  }

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
  public function buildLink() {
    $root = 'sphp/viewerjs/#../../';
    if ($this->file->isFile()) {
      $extension = $this->file->getFileInfo()->getExtension();
      if ($extension === 'php') {
        $name = $this->file->getBasename('.php');
        $path = $this->urlPath . $name;
        $linkText = '<span class="badge html5" title="HTML-sivu"><i class="fa fa-html5"></i></span> Vuosi ' . $name;
        //$link = new Hyperlink($path, $linkText, $this->getTarget());
        $target = $this->getTarget();
      } else if ($extension === 'pdf') {
        $name = $this->file->getBasename('.pdf');
        $path = $root . $this->file->getPathname();
        $size = $this->formatBytes();
        $linkText = '<span class="badge alert" title="PDF-tiedosto"><i class="fa fa-file-pdf-o"></i></span> Vuosi ' . $name;
        $linkText .= " <small>($size)</small>";
        //$link = new Hyperlink($path, $linkText, $this->getTarget());
        $target = $name . $size;
      }
      $link = new $this->linkType;
      $link->setHref($path)->setTarget($target)->replaceContent($linkText);
    } else {
      throw new \Sphp\Exceptions\RuntimeException();
    }
    return $link;
  }

  public function getHtml() {
    return $this->buildLink()->getHtml();
  }

}
