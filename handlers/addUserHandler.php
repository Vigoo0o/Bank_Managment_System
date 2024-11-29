<?php
include '../functions.php';
include '../global.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'];
  if (!isUsernameUsed($userDB, $username)) {
    $userPerr = [
      'addClient' => $_POST['permitions-addClient'],
      'deleteClient' => $_POST['permitions-deleteClient'],
      'searchClient' => $_POST['permitions-searchClient'],
      'viewClient' => $_POST['permitions-viewClient'],
      'updateClient' => $_POST['permitions-updateClient'],
      'users' => $_POST['permitions-Users']
    ];
    $user = new User(
      $_POST['username'],
      $_POST['password'],
      finalyPermitionCode($userPerr)
    );
    addUserToDB(convertUserObjectToRecord($user), $userDB);
    operationTrue('../user/addUser.php');
  } else {
    operationFalse('../user/addUser.php');
  }
}