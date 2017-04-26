<?php

/**
 * TitleGenerator.php (UTF-8)
 * Copyright (c) 2014 Sami Holck <sami.holck@gmail.com>
 */

namespace Sphp\MVC;

use Sphp\Stdlib\Strings;

/**
 * Generates a page title for the given page
 *
 * @author  Sami Holck <sami.holck@gmail.com>
 * @since   2014-09-11
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPLv3
 * @filesource
 */
class TitleGenerator {

  /**
   * Constructs a new instance
   * 
   * @param array $data
   */
  public function __construct(array $data) {
    $this->data = $data;
    $this->titleData = $this->parseTitles();
    $this->parseTitles();
  }

  protected function parseTitles() {
    // print_r($this->data);
    $arrIt = new \RecursiveIteratorIterator(new \RecursiveArrayIterator($this->data));
    $outputArray = [];
    foreach ($arrIt as $sub) {
      $subArray = $arrIt->getSubIterator();
      if ($subArray->key() === 'href') {
        $outputArray[] = iterator_to_array($subArray);
      }
    }

    // print_r($outputArray);
    return $outputArray;
  }

  public function createTitleFor($page) {

    $page = trim($page, '/');
    $title = 'Raision Veneseura';
    foreach ($this->titleData as $pair) {
      if ($pair['href'] === $page) {
        if (array_key_exists('page_title', $pair)) {
          $title .= ': ' . $pair['page_title'];
        } else {
          $title .= ': ' . $pair['link'];
        }
        //break;
        return $title;
      }
    }
    if (Strings::startsWith($page, 'kilpailut/')) {
      //echo $page;
      if (is_file("sivut/$page.php")) {
        $parts = explode('/', $page);
        $title .= ': ' . Strings::toTitleCase($parts[1]) . $parts[0] . " vuonna " . $parts[2];
      }
    }
    return $title;
  }

}
