<?php

/**
 * LinkDataParser.php (UTF-8)
 * Copyright (c) 2017 Sami Holck <sami.holck@gmail.com>
 */

namespace Sphp\MVC;

use FilesystemIterator;
use SplFileInfo;
use Sphp\Stdlib\Parser;
use Sphp\Stdlib\Path;

/**
 * Description of LinkDataParser
 *
 * @author  Sami Holck <sami.holck@gmail.com>
 * @since   2017-03-11
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPLv3
 * @filesource
 */
class LinkDataParser {

  /**
   *
   * @var array
   */
  private $traversed;

  /**
   * Constructs a new instance
   * 
   * @param string $filepath
   */
  public function __construct($filepath, $defaultRoot = '') {
    $this->traversed = [];
    //$this->filePath = $filepath;
    $this->defaultRoot = $defaultRoot;
    $data = Parser::fromFile($filepath);
    $this->doit($data);
  }

  /**
   * 
   * @param array $data
   */
  private function doit(array $data) {
    $this->traversed = $this->parseArray($data);
  }

  /**
   * 
   * @param  array $data
   * @return array
   */
  private function parseArray(array $data) {
    $result = [];
    foreach ($data as $k => $v) {
      if (is_array($v)) {
        if (array_key_exists('dir', $v)) {
          if (array_key_exists('menu', $v)) {
            $result[$k] = $v;
            $result[$k]['items'] = $this->parseDir($v);
          } else {
            $result = array_merge($result, $this->parseDir($v));
          }
          //$result[$k]['rgwe<'] = '32';
          //echo 'ergha';
        } else if (array_key_exists('page', $v)) {
          $result[$k] = $this->parsePage($v);
        } else if ($k === 'items' || is_numeric($k)) {
          $result[$k] = $this->parseArray($v);
        } else {
//          $result[$k] = $v;
        }
      } else {
        $result[$k] = $v;
      }
    }
    return $result;
  }

  /**
   * 
   * @param  string $dirpath
   * @return array
   */
  private function parsePage(array $dirpath) {
    $result = $dirpath;
    $page = $dirpath['page'];
    $result['path'] = Path::get()->local('sivut/' . $page . '.php');
    $result[SplFileInfo::class] = new SplFileInfo($result['path']);
    return $result;
  }

  /**
   * 
   * @param  string $data
   * @return array
   */
  private function parseDir(array $data) {
    $fileData['file_prefix'] = array_key_exists('file_prefix', $data) ? $data['file_prefix'] : '';
    $fileData['relative_dir'] = $data['dir'];
    $fileData['remove_filetype'] = array_key_exists('remove_filetype', $data) ? $data['remove_filetype'] : false;
    $dir = Path::get()->local($data['dir']);
    //echo $dirpath;
    $result = [];
    $it = new FilesystemIterator($dir);
    foreach ($it as $fileinfo) {
      //echo $fileinfo->getFilename();
      if ($fileinfo->isFile()) {
        $r = $this->parseFile($fileinfo, $fileData);
        $result[] = $r;
      }
    }
    $a = [];
    $a['menu']['items'] = $result;
    return $result;
  }

  /**
   * 
   * @param  SplFileInfo $fileinfo
   * @param  array $data
   * @return array
   */
  private function parseFile(SplFileInfo $fileinfo, array $data = []) {
    //$result['page'] = $fileinfo->getFilename();
    $page = $data['relative_dir'] . '/' . $fileinfo->getFilename();
    //$result['link'] = $fileinfo->getBasename('.php');
    $result['page'] = str_replace(['/', '.php'], ['.', ''], $page);
    $result['relative'] = $page;
    $result['fullPath'] = $fileinfo->getPathname();
    $result[SplFileInfo::class] = $fileinfo;
    if ((bool) $data['remove_filetype']) {
      $filename = $fileinfo->getBasename('.' . $fileinfo->getExtension());
    } else {
      $filename = $fileinfo->getBasename();
    }
    $result['link'] = $data['file_prefix'] . $filename;
    return $result;
  }

  public function toArray() {
    return $this->traversed;
  }

}
