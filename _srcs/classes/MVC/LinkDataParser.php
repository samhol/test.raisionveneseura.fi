<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Sphp\MVC;

/**
 * Description of LinkDataParser
 *
 * @author Sami
 */
class linkDataParser {

  /**
   *
   * @var array
   */
  private $traversed;

  public function __construct(array $data) {
    $this->traversed = [];
    $this->titleData = $this->parseTitles();
    $this->traverseData($data);
  }

  private function traverseData(array $data) {

    foreach ($data as $key => $item) {
      if (array_key_exists('link', $item)) {
        $this->traversed['link'];
      } else if (array_key_exists('menu', $item) && array_key_exists('items', $item)) {
        $instance->append($this->buildSub($item));
      } else if (array_key_exists('separator', $item)) {
        $instance->appendText($item['separator']);
      }
    }
    return $instance;
  }

}
