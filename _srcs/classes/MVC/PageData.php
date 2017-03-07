<?php

namespace Sphp\MVC;

use Sphp\Core\Http\HttpCodeCollection;

class PageData {

  /**
   *
   * @var HttpCodeCollection 
   */
  private $httpCodes;

  public function __construct() {
    $this->errorCode = filter_input(INPUT_SERVER, 'REDIRECT_STATUS', FILTER_SANITIZE_NUMBER_INT);
    if ($this->errorCode === null) {
      $this->errorCode = filter_input(INPUT_GET, 'error_code', FILTER_SANITIZE_NUMBER_INT);
    }
    $this->page = $page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_STRING);
    $this->httpCodes = new HttpCodeCollection();
  }

  public function isValid() {
    return $this->errorCode === null;
  }

  public function getPage() {
    return $this->page;
  }

  public function getErrorCode() {
    return $this->httpCodes->getCode($this->errorCode);
  }

}
