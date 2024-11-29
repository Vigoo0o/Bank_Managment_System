<?php
  include "../functions.php";
  include "../global.php";

  session_start();

  if($_SERVER['REQUEST_METHOD'] == "POST") {
    $accNumber = $_POST["accountNumber"];
    if(isClientExist($accNumber, $clientDB)) {
      updateCleintInformation($clientDB, $accNumber,
      $_POST["fname"], $_POST["lname"], $_POST["age"],
      $_POST["address"], $_POST["phone"], $_POST["accountBalance"]);

      operationTrue("../client/updateClient.php");
    } else {
      operationFalse("../client/updateClient.php");
    }
  }