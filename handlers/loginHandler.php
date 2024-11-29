<?php
include "../functions.php";
include "../global.php";

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $currUser;
  if (isUserExist($_POST['username'], $userDB, $_POST['password'], $currUser)) {
    $_SESSION['login'] = 'true';
    $_SESSION['username'] = $currUser->getUsername();
    $_SESSION['perrCode'] = $currUser->getPermission();
    operationTrue('../index.php');
  } else {
    operationFalse('../login.php');
  }
}