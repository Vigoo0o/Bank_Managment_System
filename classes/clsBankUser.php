<?php

class user {
  private $_username;
  private $_password;
  private $_permission;

  public function __construct($username , $password, $permission) {
    $this->_username = $username;
    $this->_password = $password;
    $this->_permission = $permission;
  }

  function getUsername() {
    return $this->_username;
  }

  function getPassword() {
    return $this->_password;
  }

  function getPermission() {
    return $this->_permission;
  }

  function setUsername($username) {
    $this->_username = $username;
  }

  function setPassword($password) {
    $this->_password = $password;
  }

  function setPermission($permission) {
    $this->_permission = $permission;
  }
}