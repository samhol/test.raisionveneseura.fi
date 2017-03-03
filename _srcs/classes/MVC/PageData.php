<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Sphp\MVC;

/**
 * Description of PageData
 *
 * @author Sami
 */
class PageData {

  //put your code here

  public function __construct() {
    $this->errorCode = filter_input(INPUT_SERVER, 'REDIRECT_STATUS', FILTER_SANITIZE_NUMBER_INT);
    if ($this->errorCode === null) {
      $this->errorCode = filter_input(INPUT_GET, 'error_code', FILTER_SANITIZE_NUMBER_INT);
    }
    $this->page = $page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_STRING);
  }

  public function isPage() {
    
  }

}
