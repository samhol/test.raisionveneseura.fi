<?php

/**
 * UrlGenerator.php (UTF-8)
 * Copyright (c) 2017 Sami Holck <sami.holck@gmail.com>
 */

namespace Sphp\MVC\Filesystem;

use SplFileInfo;

/**
 * Description of UrlGenerator
 *
 * @author  Sami Holck <sami.holck@gmail.com>
 * @since   2017-04-25
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPLv3
 * @filesource
 */
class UrlGenerator {

  private static $urlMap = [
      'php' => '',
      'html' => '',
      'pdf' => 'sphp/viewerjs/index.html#../../',
      'ods' => 'sphp/viewerjs/index.html#../../',
      'odp' => 'sphp/viewerjs/index.html#../../',
      'odt' => 'sphp/viewerjs/index.html#../../',
  ];

  /**
   * 
   * @param  string $localPath
   * @return string
   */
  public function __invoke($localPath) {
    return static::generate($localPath);
  }

  /**
   * 
   * @param  string|SplFileInfo $localPath
   * @return string
   */
  public static function generate($localPath) {
    if (!$localPath instanceof SplFileInfo) {
      $localPath = new SplFileInfo($localPath);
    }
    $url = \Sphp\Stdlib\Path::get()->http();
    if ($localPath->isFile()) {
      $extension = $localPath->getFileInfo()->getExtension();
      $url .= static::getPathForExtension($extension);
      if ($extension === 'php') {
        $name = $localPath->getBasename('.php');
        $localPath1 = $localPath->getPath();
        $path = str_replace('sivut/', '', $localPath1);
        $url .= "{$path}/{$name}.html";
      } else {
        $url .= $localPath->getPathname();
      }
    }
    return $url;
  }

  /**
   * 
   * @param  string $extension
   * @return string
   */
  protected static function getPathForExtension($extension) {
    if (array_key_exists($extension, static::$urlMap)) {
      return static::$urlMap[$extension];
    }
    return '';
  }

}
