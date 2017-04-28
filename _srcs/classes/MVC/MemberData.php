<?php

/**
 * MemberData.php (UTF-8)
 * Copyright (c) 2017 Sami Holck <sami.holck@gmail.com>
 */

namespace Sphp\MVC;

/**
 * Description of MemberData
 *
 * @author Sami Holck
 */
class MemberData {

  /**
   * @var mixed 
   */
  private $age;

  /**
   * @var mixed 
   */
  private $fname;

  /**
   * @var mixed 
   */
  private $lname;

  /**
   * @var mixed 
   */
  private $email;

  /**
   * @var mixed 
   */
  private $phoneNumber;

  /**
   * @var mixed 
   */
  private $street;

  /**
   * @var mixed 
   */
  private $zipcode;

  /**
   * @var mixed 
   */
  private $city;

  /**
   * Constructs a new instance
   * 
   * @param array $data
   */
  public function __construct(array $data) {
    foreach ($data as $k => $v) {
      $this->{$k} = $v;
    }
  }

  /**
   * 
   * @return mixed
   */
  public function getAge() {
    return $this->age;
  }

  /**
   * 
   * @return mixed
   */
  public function getFname() {
    return $this->fname;
  }

  /**
   * 
   * @return mixed
   */
  public function getLname() {
    return $this->lname;
  }

  /**
   * 
   * @return mixed
   */
  public function getEmail() {
    return $this->email;
  }

  /**
   * 
   * @return boolean
   */
  public function hasPhoneNumber() {
    return is_string($this->phoneNumber);
  }

  /**
   * 
   * @return mixed
   */
  public function getPhoneNumber() {
    return $this->phoneNumber;
  }

  /**
   * 
   * @return mixed
   */
  public function getStreet() {
    return $this->street;
  }

  /**
   * 
   * @return mixed
   */
  public function getZipcode() {
    return $this->zipcode;
  }

  /**
   * 
   * @return mixed
   */
  public function getCity() {
    return $this->city;
  }

}
