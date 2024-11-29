<?php
include '../functions.php';
include '../global.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isUserExist($_POST['username'], $userDB, $_POST['curr-pass'])) {
    $userPerr = [
      'addClient' => $_POST['permitions-addClient'],
      'deleteClient' => $_POST['permitions-deleteClient'],
      'searchClient' => $_POST['permitions-searchClient'],
      'viewClient' => $_POST['permitions-viewClient'],
      'updateClient' => $_POST['permitions-updateClient'],
      'users' => $_POST['permitions-Users']
    ];
    updateUserData($userDB, $_POST['username'], $_POST['curr-pass'], $userPerr, $_POST['new-pass']);
    operationTrue('../user/updateUser.php');
  } else {
    operationFalse('../user/updateUser.php');
  }
}
