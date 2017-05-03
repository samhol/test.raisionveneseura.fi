<?php

/**
 * GreaterThanValidator.php (UTF-8)
 * Copyright (c) 2017 Sami Holck <sami.holck@gmail.com>
 */

namespace Sphp\Validators;

/**
 * Description of GreaterThanValidator
 *
 * @author  Sami Holck <sami.holck@gmail.com>
 * @since   2017-03-28
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPLv3
 * @filesource
 */
class GreaterThanValidator extends AbstractValidator {

  /**
   * Whether to do inclusive comparisons, allowing equivalence to max
   *
   * If false, then strict comparisons are done, and the value may equal
   * the min option
   *
   * @var boolean
   */
  private $inclusive;
  private $min;

  /**
   * Constructs a new validator
   * 
   * @param float $min the minimum value
   * @param float $max the maximum value
   * @param boolean $inclusive
   */
  public function __construct($min, $inclusive = true) {
    parent::__construct();
    $this->setMin($min)->setInclusive($inclusive);
    $this->createMessageTemplate(static::NOT_GREATER, 'Not in range (%s-%s)');
    $this->createMessageTemplate(static::NOT_GREATER_INCLUSIVE, 'Not in inclusive range (%s-%s)');
  }

  /**
   * 
   * @return boolean
   */
  public function getInclusive() {
    return $this->inclusive;
  }

  /**
   * Returns the minimum value
   * 
   * @return float the minimum value
   */
  public function getMin() {
    return $this->min;
  }

  /**
   * 
   * @param type $inclusive
   * @return self for a fluent interface
   */
  public function setInclusive($inclusive) {
    $this->inclusive = $inclusive;
    return $this;
  }

  /**
   * Sets the minimum value
   * 
   * @param  float $min the minimum value
   * @return self for a fluent interface
   */
  public function setMin($min) {
    $this->min = $min;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function isValid($value) {
    $this->setValue($value);
    if ($this->inclusive) {
      if ($this->min > $value) {
        $this->error(self::NOT_GREATER_INCLUSIVE);
        return false;
      }
    } else {
      if ($this->min >= $value) {
        $this->error(self::NOT_GREATER);
        return false;
      }
    }
    return true;
  }

}
