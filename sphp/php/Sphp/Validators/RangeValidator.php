<?php

/**
 * RangeValidator.php (UTF-8)
 * Copyright (c) 2017 Sami Holck <sami.holck@gmail.com>
 */

namespace Sphp\Validators;

/**
 * Description of RangeValidator
 *
 * @author  Sami Holck <sami.holck@gmail.com>
 * @since   2017-05-03
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPLv3
 * @filesource
 */
class RangeValidator extends AbstractValidator {

  const NOT_IN_RANGE = '_not_in_range_';
  const NOT_IN_INCLUSIVE_RANGE = '_not_in_inclusive_range_';

  /**
   * Whether to do inclusive comparisons, allowing equivalence to max
   *
   * If false, then strict comparisons are done, and the value may equal
   * the min option
   *
   * @var boolean
   */
  private $inclusive;

  /**
   * @var float 
   */
  private $min;

  /**
   * @var float 
   */
  private $max;

  /**
   * Constructs a new validator
   * 
   * @param float $min the minimum value
   * @param float $max the maximum value
   * @param boolean $inclusive
   */
  public function __construct($min, $max, $inclusive = true) {
    parent::__construct();
    $this->setMin($min)->setMax($max)->setInclusive($inclusive);
    $this->createMessageTemplate(static::NOT_IN_RANGE, 'Not in range (%s-%s)');
    $this->createMessageTemplate(static::NOT_IN_INCLUSIVE_RANGE, 'Not in inclusive range (%s-%s)');
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
   * Returns the maximum value
   * 
   * @return float the maximum value
   */
  public function getMax() {
    return $this->max;
  }

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
   * Sets the maximum value
   * 
   * @param  float $max the maximum value
   * @return self for a fluent interface
   */
  public function setMax($max) {
    $this->max = $max;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function isValid($value) {
    $this->setValue($value);
    if ($this->inclusive) {
      if ($this->min > $value || $this->max < $value) {
        $this->error(static::NOT_IN_RANGE, [$this->min, $this->max]);
        return false;
      }
    } else {
      if ($this->min >= $value || $this->max <= $value) {
        $this->error(static::NOT_IN_INCLUSIVE_RANGE, [$this->min, $this->max]);
        return false;
      }
    }
    return true;
  }

}
