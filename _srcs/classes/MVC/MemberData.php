<?php

/**
 * MemberData.php (UTF-8)
 * Copyright (c) 2017 Sami Holck <sami.holck@gmail.com>
 */

namespace Sphp\MVC;

/**
 * Description of MemberData
 *
 * @author  Sami Holck <sami.holck@gmail.com>
 * @since   2017-03-11
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPLv3
 * @filesource
 */
class MemberData {

  /**
   * @var mixed 
   */
  private $dob;

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
  private $phone;

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
   * @var mixed 
   */
  private $information;

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

  public function hasDateOfBirth() {
    if (is_string($this->dob)) {
      return \DateTime::createFromFormat('j.n.Y', $this->dob);
    }
    return null;
  }

  /**
   * 
   * @return mixed
   */
  public function getDateOfBirth() {
    if (is_string($this->dob)) {
      return \DateTime::createFromFormat('j.n.Y', $this->dob);
    }
    return null;
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
    return !empty($this->phone);
  }

  /**
   * 
   * @return mixed
   */
  public function getPhoneNumber() {
    return $this->phone;
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

  /**
   * 
   * @return boolean
   */
  public function hasAdditionalInformation() {
    return !empty($this->information);
  }

  /**
   * 
   * @return mixed
   */
  public function getAdditionalInformation() {
    return $this->information;
  }

}
