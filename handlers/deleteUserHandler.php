<?php
include '../functions.php';
include '../global.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isUserExist($_POST['username'], $userDB)) {
    deleteUser($_POST['username'], $userDB);
    operationTrue('../user/deleteUser.php');
  } else {
    operationFalse('../user/deleteUser.php');
  }
}