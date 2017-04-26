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

  private $age;
  private $fname;
  private $lname;
  private $email;
  private $phoneNumber;
  private $street;
  private $zipcode;
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

  public function getAge() {
    return $this->age;
  }

  public function getFname() {
    return $this->fname;
  }

  public function getLname() {
    return $this->lname;
  }

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

  public function getPhoneNumber() {
    return $this->phoneNumber;
  }

  public function getStreet() {
    return $this->street;
  }

  public function getZipcode() {
    return $this->zipcode;
  }

  public function getCity() {
    return $this->city;
  }

}
