<?php
include "../functions.php";
include "../global.php";

session_start();

if ($_SERVER['REQUEST_METHOD'] === "POST") {
  $client = new client(
    $_POST['fname'],
    $_POST['lname'],
    $_POST['age'],
    $_POST['address'],
    $_POST['phone'],
    $_POST['accountNumber'],
    $_POST['accountBalance']
  );

  if (isClientExist($client->getAccountNumber(), $clientDB)) {
    operationFalse("../client/addClient.php");
  } else {
    addClientToDB(convertObjectToRecord($client), $clientDB);
    operationTrue("../client/addClient.php");
  }

}