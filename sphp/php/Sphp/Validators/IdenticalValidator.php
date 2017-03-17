<?php

/**
 * HttpRefererValidator.php (UTF-8)
 * Copyright (c) 2017 Sami Holck <sami.holck@gmail.com>
 */

namespace Sphp\Validators;

/**
 * Description of HttpRefererValidator
 *
 * @author  Sami Holck <sami.holck@gmail.com>
 * @since   2017-03-17
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPLv3
 * @filesource
 */
class IdenticalValidator extends AbstractValidator {

  /**
   * the valid token to compare against
   *
   * @var mixed 
   */
  private $token;

  /**
   * the strict parameter
   *
   * @var boolean 
   */
  private $strict;

  /**
   * Constructs a new validator
   * 
   * @param mixed $token the valid token to compare against
   * @param boolean $strict the strict parameter
   */
  public function __construct($token = null, $strict = false) {
    parent::__construct();
    $this->setToken($token)->setStrict($strict);
  }

  /**
   * Returns the valid token to compare against
   * 
   * @return mixed the valid token to compare against
   */
  public function getToken() {
    return $this->token;
  }

  /**
   * Returns the strict parameter
   * 
   * @return boolean the strict parameter
   */
  public function getStrict() {
    return $this->strict;
  }

  /**
   * Sets the valid token to compare against
   * 
   * @param  mixed $token the valid token to compare against
   * @return self for a fluent interface
   */
  public function setToken($token) {
    $this->token = $token;
    return $this;
  }

  /**
   * Sets the strict parameter
   * 
   * @param  boolean $strict the strict parameter
   * @return self for a fluent interface
   */
  public function setStrict($strict) {
    $this->strict = (bool) $strict;
    return $this;
  }

  public function isValid($value) {
    $this->setValue($value);
    if ($this->getStrict()) {
      $valid = $this->getToken() === $this->getValue();
    } else {
      $valid = $this->getToken() == $this->getValue();
    }
    if (!$valid) {
      $this->createErrorMessage("The two given tokens do not match");
    }
    return $valid;
  }

}
