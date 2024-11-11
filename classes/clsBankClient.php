<?php

class client {
  private $_fName;
  private $_lName;
  private $_age;
  private $_address;
  private $_phone;
  private readonly string $_accountNumber;
  private $_accountBalance;

  public function __construct($fName, $lName, $age, $address, $phone, $accountNumber, $accountBalance) {
    $this->_fName = $fName;
    $this->_lName = $lName;
    $this->_age = $age;
    $this->_address = $address;
    $this->_phone = $phone;
    $this->_accountNumber = $accountNumber;
    $this->_accountBalance = $accountBalance;
  }

  public function getFName() {
    return $this->_fName;
  }

  public function setFName($fName) {
    $this->_fName = $fName;
  }

  public function getLName() {
    return $this->_lName;
  }

  public function setLName($lName) {
    $this->_lName = $lName;
  }

  public function getAge() {
    return $this->_age;
  }

  public function setAge($age) {
    $this->_age = $age;
  }

  public function getAddress() {
    return $this->_address;
  }

  public function setAddress($address) {
    $this->_address = $address;
  }

  public function getAccountNumber() {
    return $this->_accountNumber;
  }

  public function getAccountBalance() {
    return $this->_accountBalance;
  }

  public function setAccountBalance($accountBalance) {
    $this->_accountBalance = $accountBalance;
  }

  public function getPhone() {
    return $this->_phone;
  }

  public function setPhone($phone) {
    $this->_phone = $phone;
  }

  public function fullName() {
    return $this->_fName . " " . $this->_lName;
  }
} 