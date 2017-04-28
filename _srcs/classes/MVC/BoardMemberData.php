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
class BoardMemberData {

  /**
   * @var mixed 
   */
  private $name;

  /**
   * @var mixed 
   */
  private $title;

  /**
   * @var mixed 
   */
  private $email;

  /**
   * @var mixed 
   */
  private $phoneNumber;

  /**
   * Constructs a new instance
   * 
   * @param array $data
   */
  public function __construct(array $data) {
    foreach ($data as $k => $v) {
      switch ($k) {
        case 0:
          $this->title = $v;
          break;
        case 1:
          $this->name = $v;
          break;
        case 2:
          $this->phoneNumber = $v;
          break;
        case 3:
          $this->email = $v;
          break;
      }
      $this->{$k} = $v;
    }
  }

  /**
   * 
   * @return mixed
   */
  public function getName() {
    return $this->name;
  }

  /**
   * 
   * @return mixed
   */
  public function getTitle() {
    return $this->title;
  }

  /**
   * 
   * @return boolean
   */
  public function hasEmail() {
    return !empty($this->email);
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
    return !empty($this->phoneNumber);
  }

  /**
   * 
   * @return mixed
   */
  public function getPhoneNumber() {
    return $this->phoneNumber;
  }
  
  public function hasContactInfo() {
    return $this->hasPhoneNumber() || $this->hasEmail();
  }

}
