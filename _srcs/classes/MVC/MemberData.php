<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Sphp\MVC;

/**
 * Description of MemberData
 *
 * @author Sami Holck
 */
class MemberData {

  private $fname;
  private $lname;
  private $email;
  private $street;
  private $zipcode;
  private $city;

  public function __construct($fname, $lname, $email, $street, $zipcode, $city) {
    $this->fname = $fname;
    $this->lname = $lname;
    $this->email = $email;
    $this->street = $street;
    $this->zipcode = $zipcode;
    $this->city = $city;
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
